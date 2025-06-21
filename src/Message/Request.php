<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message;

use JsonSerializable;

interface Request extends JsonSerializable
{
    public function method(): Method;

    /**
     * @return array<string, mixed>
     */
    public function parameters(): array;

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array;
}
