<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use JsonSerializable;

interface PrimitiveSchema extends JsonSerializable
{
    public function jsonSerialize(): array;
}
