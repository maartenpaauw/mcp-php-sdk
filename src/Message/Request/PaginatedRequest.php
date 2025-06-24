<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Override;

abstract readonly class PaginatedRequest extends BaseRequest
{
    public function __construct(
        private ?Cursor $cursor = null,
    ) {}

    public function getCursor(): ?Cursor
    {
        return $this->cursor;
    }

    #[Override]
    public function getParameters(): array
    {
        return [
            'cursor' => $this->cursor,
        ];
    }
}
