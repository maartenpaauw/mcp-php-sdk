<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;

#[JsonRpc\Method(Method::ListRoots)]
final readonly class ListRootsRequest implements Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private ?MetaWithProgressToken $meta = null,
    ) {}
}
