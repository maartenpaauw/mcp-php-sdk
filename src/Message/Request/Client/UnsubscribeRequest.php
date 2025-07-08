<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\HasUri;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;

#[JsonRpc\Method(Method::Unsubscribe)]
final readonly class UnsubscribeRequest implements Request
{
    use HasMetadataWithProgressToken;
    use HasUri;

    public function __construct(
        private Uri $uri,
        private ?MetaWithProgressToken $meta = null,
    ) {}
}
