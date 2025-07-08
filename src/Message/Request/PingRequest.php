<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;

#[JsonRpc\Method(Method::Ping)]
final readonly class PingRequest implements Client\Request, Server\Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private ?MetaWithProgressToken $meta = null,
    ) {}
}
