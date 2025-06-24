<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Override;

final readonly class ListRootsRequest extends BaseRequest implements Request
{
    #[Override]
    public function getMethod(): Method
    {
        return Method::ListRoots;
    }
}
