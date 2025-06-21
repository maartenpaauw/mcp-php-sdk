<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\JsonRpc;

use Override;

final readonly class Request implements Message
{
    public function __construct(
        private Version $version,
        private RequestIdentifier $identifier,
        private \Maartenpaauw\Mcp\Message\Request $request,
    ) {}

    public function version(): Version
    {
        return $this->version;
    }

    public function identifier(): RequestIdentifier
    {
        return $this->identifier;
    }

    public function request(): \Maartenpaauw\Mcp\Message\Request
    {
        return $this->request;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        $data = [
            'jsonrpc' => $this->version,
            'id' => $this->identifier,
            'method' => $this->request->method(),
        ];

        $parameters = $this->request->parameters();

        if ($parameters !== []) {
            $data['params'] = $parameters;
        }

        return $data;
    }
}
