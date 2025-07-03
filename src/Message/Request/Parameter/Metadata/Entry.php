<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Metadata;

use Maartenpaauw\Mcp\Message\Request\Parameter\Unknown;

final readonly class Entry
{
    public function __construct(
        private Key $key,
        private Unknown $value,
    ) {}
}
