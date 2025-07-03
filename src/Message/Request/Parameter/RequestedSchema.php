<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;

final readonly class RequestedSchema implements Parameter
{
    public function __construct(
        private array $properties,
        private ?array $required = null,
    ) {
        if ($this->properties === []) {
            throw new InvalidArgumentException(message: 'Properties cannot be empty');
        }

        foreach ($this->properties as $property => $schema) {
            if (is_string(value: $property) === false) {
                throw new InvalidArgumentException(message: 'Property must be a string');
            }

            if ($schema instanceof PrimitiveSchema === false) {
                throw new InvalidArgumentException(message: 'Schema must be a primitive schema');
            }
        }

        if ($this->required === []) {
            throw new InvalidArgumentException(message: 'Required properties cannot be empty');
        }

        $propertyNames = array_keys(array: $this->properties);

        foreach ($required ?? [] as $property) {
            if (is_string(value: $property) === false) {
                throw new InvalidArgumentException(message: 'Property must be a string');
            }

            if (in_array(needle: $property, haystack: $propertyNames) === false) {
                throw new InvalidArgumentException(message: 'Invalid property');
            }
        }
    }

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'object');
    }

    #[JsonRpc\Parameter]
    public function properties(): array
    {
        return $this->properties;
    }

    #[JsonRpc\Parameter]
    public function required(): ?array
    {
        return $this->required;
    }
}
