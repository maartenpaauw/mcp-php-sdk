<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;

final readonly class EnumSchema implements PrimitiveSchema
{
    public function __construct(
        private array $enum,
        private ?Title $title = null,
        private ?Description $description = null,
        private ?array $enumNames = null,
    ) {
        if ($this->enum === []) {
            throw new InvalidArgumentException(message: 'Enum must have at least one string value');
        }

        foreach ($this->enum as $value) {
            if (is_string($value) === false) {
                throw new InvalidArgumentException(message: 'Enum value must be a string');
            }
        }

        foreach ($this->enumNames ?? [] as $name) {
            if (is_string($name) === false) {
                throw new InvalidArgumentException(message: 'Enum name must be a string');
            }
        }
    }

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'string');
    }

    #[JsonRpc\Parameter]
    public function enum(): array
    {
        return $this->enum;
    }

    #[JsonRpc\Parameter]
    public function title(): ?Title
    {
        return $this->title;
    }

    #[JsonRpc\Parameter]
    public function description(): ?Description
    {
        return $this->description;
    }

    #[JsonRpc\Parameter]
    public function enumNames(): ?array
    {
        return $this->enumNames;
    }
}
