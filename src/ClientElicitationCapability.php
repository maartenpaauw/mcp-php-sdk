<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use JsonSerializable;
use Override;

final readonly class ClientElicitationCapability implements JsonSerializable
{
    #[Override]
    public function jsonSerialize(): array
    {
        return [];
    }
}
