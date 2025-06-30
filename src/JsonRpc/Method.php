<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Attribute;
use Maartenpaauw\Mcp\Message\Request;

/**
 * @internal
 */
#[Attribute(Attribute::TARGET_CLASS)]
final readonly class Method
{
    public function __construct(
        public Request\Method $method,
    ) {}
}
