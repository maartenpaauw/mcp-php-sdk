<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Server;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Message;
use Maartenpaauw\Mcp\Message\Request\Parameter\RequestedSchema;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class ElicitRequest extends BaseRequest implements Request
{
    public function __construct(
        private Message $message,
        private RequestedSchema $requestedSchema,
    ) {}

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function getRequestedSchema(): RequestedSchema
    {
        return $this->requestedSchema;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::CreateElicitation;
    }

    #[Override]
    public function getParameters(): array
    {
        return array_filter(
            array: [
                'message' => $this->message,
                'requestedSchema' => $this->requestedSchema,
            ],
            callback: new ParameterFilter(),
        );
    }
}
