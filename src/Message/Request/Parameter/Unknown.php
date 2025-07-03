<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class Unknown implements JsonSerializable
{
    public function __construct(
        private mixed $value,
    ) {}

    #[Override]
    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
