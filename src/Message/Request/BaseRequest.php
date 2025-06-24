<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

abstract readonly class BaseRequest
{
    public function getParameters(): array
    {
        return [];
    }

    public function jsonSerialize(): array
    {
        return array_filter(
            array: $this->getParameters(),
            callback: new ParameterFilter(),
        );
    }
}
