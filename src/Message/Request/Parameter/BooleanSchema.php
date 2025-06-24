<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Override;

final readonly class BooleanSchema implements PrimitiveSchema
{
    public function __construct(
        private ?string $title = null,
        private ?string $description = null,
        private ?bool $default = null,
    ) {
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

    public function isDefault(): ?bool
    {
        return $this->default;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(array: [
            'type' => 'boolean',
            'title' => $this->title,
            'description' => $this->description,
            'default' => $this->default,
        ]);
    }
}
