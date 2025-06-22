<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Override;

final readonly class UnsubscribeRequest extends BaseRequest implements Request
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
        return Method::Unsubscribe;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'uri' => $this->uri,
        ];
    }
}
