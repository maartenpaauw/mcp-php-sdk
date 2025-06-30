<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Attribute;

/**
 * @internal
 */
#[Attribute(Attribute::TARGET_METHOD)]
final readonly class Parameter
{
    public function __construct(
        public ?string $alias = null,
    ) {}
}
