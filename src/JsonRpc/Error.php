<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Override;

final readonly class Error implements Message
{
    public function __construct(
        private Version $version,
        private RequestIdentifier $requestIdentifier,
    ) {}

    public function getRequestIdentifier(): RequestIdentifier
    {
        return $this->requestIdentifier;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => $this->version,
            'id' => $this->requestIdentifier,
        ];
    }
}
