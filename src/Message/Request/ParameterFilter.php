<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

/**
 * @internal
 */
final readonly class ParameterFilter
{
    public function __invoke(mixed $parameter): bool
    {
        return $parameter !== [] && $parameter !== null;
    }
}
