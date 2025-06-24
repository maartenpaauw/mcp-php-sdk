<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;
use Override;

final readonly class ReadResourceRequest extends BaseRequest implements Request
{
    public function __construct(
        private Uri $uri,
    ) {}

    public function getUri(): Uri
    {
        return $this->uri;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::ReadResource;
    }

    #[Override]
    public function getParameters(): array
    {
        return [
            'uri' => $this->uri,
        ];
    }
}
