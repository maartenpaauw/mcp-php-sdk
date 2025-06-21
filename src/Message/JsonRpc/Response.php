<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\JsonRpc;

use Override;

final readonly class Response implements Message
{
    public function __construct(
        private Version $version,
        private RequestIdentifier $requestIdentifier,
    ) {}

    public function version(): Version
    {
        return $this->version;
    }

    public function requestIdentifier(): RequestIdentifier
    {
        return $this->requestIdentifier;
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
