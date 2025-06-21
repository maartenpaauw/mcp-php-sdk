<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Server\Request;

use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Override;

final readonly class ListRootsRequest extends BaseRequest
{
    #[Override]
    public function method(): Method
    {
        return Method::ListRoots;
    }
}
