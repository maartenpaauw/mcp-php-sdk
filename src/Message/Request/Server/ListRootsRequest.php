<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;

#[JsonRpc\Method(Method::ListRoots)]
final readonly class ListRootsRequest implements Request {}
