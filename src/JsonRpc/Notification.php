<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Override;

final readonly class Notification implements Message
{
    public function __construct(
        private Version $version,
    ) {}

    public function version(): Version
    {
        return $this->version;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'jsonrpc' => $this->version,
        ];
    }
}
