<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Override;

final readonly class ListResourceTemplatesRequest extends PaginatedRequest implements Request
{
    #[Override]
    public function method(): Method
    {
        return Method::ListResourceTemplates;
    }
}
