<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use JsonSerializable;

interface Message extends JsonSerializable
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array;
}
