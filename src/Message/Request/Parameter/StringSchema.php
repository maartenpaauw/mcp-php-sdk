<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use LogicException;
use Override;

final readonly class StringSchema implements PrimitiveSchema
{
    public function __construct(
        private ?string $title = null,
        private ?string $description = null,
        private ?int $minLength = null,
        private ?int $maxLength = null,
        private ?StringSchemaFormat $format = null,
    ) {
        if ($this->title === '') {
            throw new InvalidArgumentException(message: 'Title cannot be empty');
        }

        if ($this->description === '') {
            throw new InvalidArgumentException(message: 'Description cannot be empty');
        }

        if ($this->maxLength < $this->minLength) {
            throw new LogicException(message: "Min length [$this->minLength] must be lesser than max length [$this->maxLength]");
        }
    }

    public function title(): ?string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function minLength(): ?int
    {
        return $this->minLength;
    }

    public function maxLength(): ?int
    {
        return $this->maxLength;
    }

    public function format(): ?StringSchemaFormat
    {
        return $this->format;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(array: [
            'type' => 'string',
            'title' => $this->title,
            'description' => $this->description,
            'minLength' => $this->minLength,
            'maxLength' => $this->maxLength,
            'format' => $this->format,
        ]);
    }
}
