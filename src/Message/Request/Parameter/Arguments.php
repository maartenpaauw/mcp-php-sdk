<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class Arguments implements JsonSerializable
{
    private array $arguments;

    public function __construct(
        Argument ...$arguments,
    )
    {
        $this->arguments = $arguments;
    }

    /**
     * @return array<string, Value>
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return array_combine(
            keys: array_map(
                callback: static fn (Argument $argument): string => (string) $argument->getName(),
                array: $this->arguments,
            ),
            values: array_map(
                callback: static fn (Argument $argument): Value => $argument->getValue(),
                array: $this->arguments,
            ),
        );
    }
}
