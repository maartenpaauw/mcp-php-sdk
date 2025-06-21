<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use InvalidArgumentException;
use JsonSerializable;
use Override;

final readonly class ProgressToken implements JsonSerializable
{
    public function __construct(
        private int | string $value,
    ) {
        if ($this->value === '') {
            throw new InvalidArgumentException(message: 'Value cannot be empty');
        }

        if ($this->value < 0) {
            throw new InvalidArgumentException(message: 'Value cannot be negative');
        }
    }

    public function value(): int | string
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): int | string
    {
        return $this->value;
    }
}
