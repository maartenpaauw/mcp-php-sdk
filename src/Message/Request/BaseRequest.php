<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

abstract readonly class BaseRequest
{
    public function parameters(): array
    {
        return [];
    }

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
