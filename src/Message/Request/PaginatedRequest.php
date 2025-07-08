<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;

abstract readonly class PaginatedRequest
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private ?Cursor $cursor = null,
        private ?MetaWithProgressToken $meta = null,
    ) {}

    #[JsonRpc\Parameter]
    public function cursor(): ?Cursor
    {
        return $this->cursor;
    }
}
