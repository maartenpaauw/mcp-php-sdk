<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Override;
use Stringable;

abstract readonly class NonEmptyString implements JsonSerializable, Stringable
{
    public function __construct(
        private string $value,
    ) {
        if ($this->value === '') {
            throw new InvalidArgumentException(message: 'Value cannot be empty');
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
