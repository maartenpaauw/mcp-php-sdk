<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Override;

final readonly class ListResourcesRequest extends BaseRequest implements Request
{
    #[Override]
    public function method(): Method
    {
        return Method::ListResources;
    }
}
