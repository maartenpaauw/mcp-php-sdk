<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use LogicException;
use Maartenpaauw\Mcp\Message\Request;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
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

                if ($instance->mapper === ArgumentsMapper::class && $value instanceof Arguments) {
                    $value = new ArgumentsMapper()(arguments: $value);
                } elseif ($value instanceof RequestParameter) {
                    $value = $this->parameters(subject: $value);
                } elseif ($value === null) {
                    continue;
                } elseif ($value === []) {
                    $value = new stdClass();
                }

                $parameters[$instance->alias ?? $reflectionMethod->getName()] = $value;
            }
        }

        return $parameters;
    }
}
