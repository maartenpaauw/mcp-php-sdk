<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use InvalidArgumentException;
use JsonSerializable;
use Override;

final readonly class Cursor implements JsonSerializable
{
    public function __construct(
        private string $value,
    ) {
        if ($this->value === '') {
            throw new InvalidArgumentException(message: 'Value cannot be empty');
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
