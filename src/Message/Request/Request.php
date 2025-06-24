<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\Message\Message;

interface Request extends Message
{
    public function getMethod(): Method;

    /**
     * @return array<string, mixed>
     */
    public function getParameters(): array;
}
