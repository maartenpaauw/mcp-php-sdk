<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Override;

final readonly class EnumSchema implements PrimitiveSchema
{
    public function __construct(
        private array $enum,
        private ?string $title = null,
        private ?string $description = null,
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

        if ($this->title === '') {
            throw new InvalidArgumentException(message: 'Title cannot be empty');
        }

        if ($this->description === '') {
            throw new InvalidArgumentException(message: 'Description cannot be empty');
        }
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(array: [
            'type' => 'string',
            'title' => $this->title,
            'description' => $this->description,
            'enum' => $this->enum,
            'enumNames' => $this->enumNames,
        ]);
    }
}
