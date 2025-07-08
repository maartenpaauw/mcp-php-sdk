<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;

#[JsonRpc\Method(Method::GetPrompt)]
final readonly class GetPromptRequest implements Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private Name $name,
        private ?Arguments $arguments = null,
        private ?MetaWithProgressToken $meta = null,
    ) {}

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function arguments(): ?Arguments
    {
        return $this->arguments;
    }
}
