<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use LogicException;
use Maartenpaauw\Mcp\JsonRpc;

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

    public function type(): string
    {
        return 'string';
    }

    #[JsonRpc\Parameter]
    public function title(): ?string
    {
        return $this->title;
    }

    #[JsonRpc\Parameter]
    public function description(): ?string
    {
        return $this->description;
    }

    #[JsonRpc\Parameter]
    public function minLength(): ?int
    {
        return $this->minLength;
    }

    #[JsonRpc\Parameter]
    public function maxLength(): ?int
    {
        return $this->maxLength;
    }

    #[JsonRpc\Parameter]
    public function format(): ?StringSchemaFormat
    {
        return $this->format;
    }
}
