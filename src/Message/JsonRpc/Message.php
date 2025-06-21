<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\JsonRpc;

use JsonSerializable;

interface Message extends JsonSerializable
{
    public function jsonSerialize(): array;
}
