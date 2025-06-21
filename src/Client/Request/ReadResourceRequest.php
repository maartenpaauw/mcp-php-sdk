<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Client\Request;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message;
use Maartenpaauw\Mcp\Message\Method;
use Override;

final readonly class ReadResourceRequest extends Message\BaseRequest
{
    public function __construct(
        private string $uri,
    ) {
        if ($this->uri === '') {
            throw new InvalidArgumentException(message: 'URI cannot be empty');
        }
    }

    public function uri(): string
    {
        return $this->uri;
    }

    #[Override]
    public function method(): Method
    {
        return Method::ReadResource;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'uri' => $this->uri,
        ];
    }
}
