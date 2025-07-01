<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\JsonRpc;

use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;

/**
 * @internal
 */
final readonly class ArgumentsMapper
{
    /**
     * @return array<string, string>
     */
    public function __invoke(Arguments $arguments): array
    {
        return array_combine(
            keys: array_map(
                callback: static fn (Argument $argument): string => (string) $argument->name(),
                array: $arguments->toArray(),
            ),
            values: array_map(
                callback: static fn (Argument $argument): string => (string) $argument->value(),
                array: $arguments->toArray(),
            ),
        );
    }
}
