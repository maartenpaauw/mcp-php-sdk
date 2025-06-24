<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Message;
use Maartenpaauw\Mcp\Message\Request\Parameter\RequestedSchema;
use Override;

final readonly class ElicitRequest extends BaseRequest implements Request
{
    public function __construct(
        private Message $message,
        private RequestedSchema $requestedSchema,
    ) {}

    public function message(): Message
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
