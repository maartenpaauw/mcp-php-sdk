<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Override;

abstract readonly class Fraction implements JsonSerializable
{
    public function __construct(
        private int | float $value,
    ){
        if ($this->value < 0 || $this->value > 1) {
            throw new InvalidArgumentException(message: 'Value must be between 0 and 1');
        }
    }

    public function value(): int | float
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): int | float
    {
        return $this->value;
    }
}
