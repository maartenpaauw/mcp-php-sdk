<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Override;
use Stringable;

final readonly class Uri implements Stringable
{
    public function __construct(
        private string $value,
    ) {
        if ($this->value === '') {
            throw new InvalidArgumentException(message: 'URI cannot be empty');
        }
    }

    #[Override]
    public function __toString(): string
    {
        return $this->value;
    }
}
