<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message;

use Override;

abstract readonly class BaseRequest implements Request
{
    #[Override]
    public function parameters(): array
    {
        return [];
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(
            array: [
                'method' => $this->method(),
                'parameters' => $this->parameters(),
            ],
            callback: static fn (mixed $item): bool => $item !== [],
        );
    }
}
