<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Override;
use ReflectionException;

final readonly class Request implements Message
{
    public function __construct(
        private Version $version,
        private RequestIdentifier $identifier,
        private \Maartenpaauw\Mcp\Message\Request\Request $request,
    ) {}

    public function version(): Version
    {
        return $this->version;
    }

    public function identifier(): RequestIdentifier
    {
        return $this->identifier;
    }

    public function request(): \Maartenpaauw\Mcp\Message\Request\Request
    {
        return $this->request;
    }

    /**
     * @throws ReflectionException
     */
    #[Override]
    public function jsonSerialize(): array
    {
        $requestReflector = new RequestReflector();

        return [
            'jsonrpc' => $this->version,
            'id' => $this->identifier,
            'method' => $requestReflector->method(request: $this->request),
            'params' => (object) $requestReflector->parameters(subject: $this->request),
        ];
    }
}
