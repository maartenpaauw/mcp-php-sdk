<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use IteratorAggregate;
use LogicException;
use Maartenpaauw\Mcp\Message\Request;
use Maartenpaauw\Mcp\Message\Request\Parameter\Parameter as RequestParameter;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use stdClass;

/**
 * @internal
 */
final readonly class RequestReflector
{
    public function method(Request\Request $request): Request\Method
    {
        $reflectionClass = new ReflectionClass(objectOrClass: $request);

        foreach ($reflectionClass->getAttributes(name: Method::class) as $method) {
            $instance = $method->newInstance();

            if ($instance instanceof Method) {
                return $instance->method;
            }
        }

        throw new LogicException(message: sprintf(
            'Request [%s] should have a %s attribute.',
            $request::class,
            Method::class,
        ));
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ReflectionException
     */
    public function parameters(Request\Request | RequestParameter $subject): array
    {
        $reflectionClass = new ReflectionClass(objectOrClass: $subject);
        $parameters = [];

        $reflectionMethods = $reflectionClass->getMethods(filter: ReflectionMethod::IS_PUBLIC);

        foreach ($reflectionMethods as $reflectionMethod) {
            $attributes = $reflectionMethod->getAttributes(name: Parameter::class);

            foreach ($attributes as $attribute) {
                $instance = $attribute->newInstance();

                if ($instance instanceof Parameter === false) {
                    throw new LogicException();
                }

                $value = $reflectionMethod->invoke(object: $subject);

                if ($value instanceof IteratorAggregate) {
                    $iteratorReflectionClass = new ReflectionClass(objectOrClass: $value);
                    $mapByAttribute = $iteratorReflectionClass->getAttributes(name: MapBy::class)[0] ?? null;

                    if ($mapByAttribute !== null) {
                        $mapBy = $mapByAttribute->newInstance();

                        if ($mapBy instanceof MapBy === false) {
                            throw new LogicException();
                        }

                        $array = [];

                        foreach ($value as $item) {
                            $keyResolver = $mapBy->key[$item::class] ?? throw new LogicException();

                            $key = is_string($keyResolver) ? $keyResolver : call_user_func(callback: [$item, $keyResolver[1]]);
                            $value = call_user_func(callback: [$item, $mapBy->value[$item::class][1]]);

                            $array[(string) $key] = $value;
                        }

                        $value = $array;
                    } else {
                        $value = array_map(
                            callback: fn (mixed $item): mixed => $item instanceof RequestParameter ? $this->parameters(subject: $item) : $item,
                            array: iterator_to_array(iterator: $value),
                        );
                    }
                }

                if ($value instanceof RequestParameter) {
                    $value = $this->parameters(subject: $value);
                }

                if ($value === null) {
                    continue;
                }

                if ($value === []) {
                    $value = new stdClass();
                }

                $parameters[$instance->alias ?? $reflectionMethod->getName()] = $value;
            }
        }

        return $parameters;
    }
}
