<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final readonly class MapBy
{
    /**
     * @param array<class-string, string | array{ 0: class-string, 1: non-empty-string }> $key
     * @param array<class-string, string | array{ 0: class-string, 1: non-empty-string }> $value
     */
    public function __construct(
        public array $key,
        public array $value,
    ) {}
}
