<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Server\Request;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Maartenpaauw\Mcp\RequestedSchema;
use Override;

final readonly class ElicitRequest extends BaseRequest
{
    public function __construct(
        private string $message,
        private RequestedSchema $requestedSchema,
    ) {
        if ($this->message === '') {
            throw new InvalidArgumentException(message: 'Message cannot be empty');
        }
    }

    public function message(): string
    {
        return $this->message;

    }

    public function requestedSchema(): RequestedSchema
    {
        return $this->requestedSchema;
    }

    #[Override]
    public function method(): Method
    {
        return Method::CreateElicitation;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'message' => $this->message,
            'requestedSchema' => $this->requestedSchema,
        ];
    }
}
