<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Uri;
use Override;

final readonly class SubscribeRequest extends BaseRequest implements Request
{
    public function __construct(
        private Uri $uri,
    ) {}

    public function uri(): Uri
    {
        return $this->uri;
    }

    #[Override]
    public function method(): Method
    {
        return Method::Subscribe;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'uri' => $this->uri,
        ];
    }
}
