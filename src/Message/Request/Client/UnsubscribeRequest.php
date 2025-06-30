<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;

#[JsonRpc\Method(Method::Unsubscribe)]
final readonly class UnsubscribeRequest implements Request
{
    public function __construct(
        private Uri $uri,
    ) {}

    #[JsonRpc\Parameter]
    public function uri(): Uri
    {
        return $this->uri;
    }
}
