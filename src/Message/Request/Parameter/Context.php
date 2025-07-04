<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class Context implements Parameter
{
    public function __construct(
        private ?Arguments $arguments = null,
    ) {}

    #[JsonRpc\Parameter]
    public function arguments(): ?Arguments
    {
        return $this->arguments;
    }
}
