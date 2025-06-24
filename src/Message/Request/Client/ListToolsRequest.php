<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Override;

final readonly class ListToolsRequest extends PaginatedRequest implements Request
{
    #[Override]
    public function getMethod(): Method
    {
        return Method::ListTools;
    }
}
