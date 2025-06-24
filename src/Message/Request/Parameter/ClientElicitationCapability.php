<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;
use stdClass;

final readonly class ClientElicitationCapability implements JsonSerializable
{
    #[Override]
    public function jsonSerialize(): stdClass
    {
        return new stdClass();
    }
}
