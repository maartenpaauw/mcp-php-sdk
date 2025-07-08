<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;

#[JsonRpc\Method(Method::Unsubscribe)]
final readonly class UnsubscribeRequest implements Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private Uri $uri,
        private ?MetaWithProgressToken $meta = null,
    ) {}

    #[JsonRpc\Parameter]
    public function uri(): Uri
    {
        return $this->uri;
    }
}
