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

    public function cursor(): ?Cursor
    {
        return $this->cursor;
    }

    #[Override]
    public function parameters(): array
    {
        return array_filter(
            array: [
                'cursor' => $this->cursor,
            ],
            callback: new ParameterFilter(),
        );
    }
}
