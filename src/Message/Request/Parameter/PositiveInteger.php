<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Override;

abstract readonly class PositiveInteger implements JsonSerializable
{
    /**
     * @param positive-int $value
     */
    public function __construct(
        private int $value,
    ) {
        if ($this->value < 1) {
            throw new InvalidArgumentException(message: 'Value must be greater than 0');
        }
    }

    /**
     * @return positive-int
     */
    #[Override]
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
