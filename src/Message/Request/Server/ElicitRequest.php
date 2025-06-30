<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Message;
use Maartenpaauw\Mcp\Message\Request\Parameter\RequestedSchema;

#[JsonRpc\Method(Method::CreateElicitation)]
final readonly class ElicitRequest implements Request
{
    public function __construct(
        private Message $message,
        private RequestedSchema $requestedSchema,
    ) {}

    #[JsonRpc\Parameter]
    public function message(): Message
    {
        return $this->message;
    }

    #[JsonRpc\Parameter]
    public function requestedSchema(): RequestedSchema
    {
        return $this->requestedSchema;
    }
}
