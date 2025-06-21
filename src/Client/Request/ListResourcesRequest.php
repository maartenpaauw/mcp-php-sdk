<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Client\Request;

use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Override;

final readonly class ListResourcesRequest extends BaseRequest
{
    #[Override]
    public function method(): Method
    {
        return Method::ListResources;
    }
}
