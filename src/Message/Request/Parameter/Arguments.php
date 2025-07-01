<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class Arguments implements Parameter
{
    private array $arguments;

    public function __construct(
        Argument ...$arguments,
    )
    {
        $this->arguments = $arguments;
    }

    #[JsonRpc\Parameter(alias: 'arguments')]
    public function toArray(): array
    {
        return $this->arguments;
    }
}
