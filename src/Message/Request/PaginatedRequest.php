<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;

abstract readonly class PaginatedRequest
{
    public function __construct(
        private ?Cursor $cursor = null,
    ) {}

    #[JsonRpc\Parameter]
    public function cursor(): ?Cursor
    {
        return $this->cursor;
    }
}
