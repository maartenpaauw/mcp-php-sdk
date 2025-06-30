<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;

#[JsonRpc\Method(Method::ListResourceTemplates)]
final readonly class ListResourceTemplatesRequest extends PaginatedRequest implements Request {}
