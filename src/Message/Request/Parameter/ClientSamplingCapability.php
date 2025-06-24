<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class ClientSamplingCapability implements JsonSerializable
{
    #[Override]
    public function jsonSerialize(): array
    {
        return [];
    }
}
