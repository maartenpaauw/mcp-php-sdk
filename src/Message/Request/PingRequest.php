<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Override;

final readonly class PingRequest extends BaseRequest implements Client\Request, Server\Request
{
    #[Override]
    public function getMethod(): Method
    {
        return Method::Ping;
    }
}
