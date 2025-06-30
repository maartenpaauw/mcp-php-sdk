<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;

#[JsonRpc\Method(Method::ListTools)]
final readonly class ListToolsRequest extends PaginatedRequest implements Request {}
