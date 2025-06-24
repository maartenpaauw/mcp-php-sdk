<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;

interface PrimitiveSchema extends JsonSerializable
{
    public function jsonSerialize(): array;
}
