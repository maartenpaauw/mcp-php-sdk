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
    /**
     * @param class-string<ArgumentsMapper>|null $mapper
     */
    public function __construct(
        public ?string $alias = null,
        public ?string $mapper = null,
    ) {}
}
