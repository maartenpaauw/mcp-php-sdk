<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;

#[JsonRpc\Method(Method::GetPrompt)]
final readonly class GetPromptRequest implements Request
{
    public function __construct(
        private Name $name,
        private ?Arguments $arguments = null,
    ) {}

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter(mapper: JsonRpc\ArgumentsMapper::class)]
    public function arguments(): ?Arguments
    {
        return $this->arguments;
    }
}
