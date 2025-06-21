<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use InvalidArgumentException;
use JsonSerializable;
use Override;

final readonly class ClientExperimentalCapability implements JsonSerializable
{
    public function __construct(
        private array $capabilities,
    ) {
        foreach ($capabilities as $key => $capability) {
            if (is_string($key) === false) {
                throw new InvalidArgumentException(message: 'Capability key must be a string');
            }
        }
    }

    public function capabilities(): array
    {
        return $this->capabilities;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return $this->capabilities;
    }
}
