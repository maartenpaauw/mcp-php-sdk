<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Override;

final readonly class Request implements Message
{
    public function __construct(
        private Version $version,
        private RequestIdentifier $identifier,
        private \Maartenpaauw\Mcp\Message\Request\Request $request,
    ) {}

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function getIdentifier(): RequestIdentifier
    {
        return $this->identifier;
    }

    public function getRequest(): \Maartenpaauw\Mcp\Message\Request\Request
    {
        return $this->request;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        $data = [
            'jsonrpc' => $this->version,
            'id' => $this->identifier,
            'method' => $this->request->getMethod(),
        ];

        $parameters = $this->request->getParameters();

        if ($parameters !== []) {
            $data['params'] = $parameters;
        }

        return $data;
    }
}
