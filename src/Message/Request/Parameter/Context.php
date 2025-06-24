<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class Context implements JsonSerializable
{
    public function __construct(
        private ?Arguments $arguments = null,
    ) {}

    public function getArguments(): ?Arguments
    {
        return $this->arguments;
    }

    /**
     * @return array{
     *     arguments?: Arguments
     * }
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(
            array: [
                'arguments' => $this->arguments,
            ],
            callback: new ParameterFilter(),
        );
    }
}
