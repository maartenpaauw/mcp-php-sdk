<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;

final readonly class ClientExperimentalCapability implements Parameter
{
    /**
     * @param array<string, mixed> $capabilities
     */
    public function __construct(
        private array $capabilities,
    ) {
        foreach ($capabilities as $key => $capability) {
            if (is_string($key) === false) {
                throw new InvalidArgumentException(message: 'Capability key must be a string');
            }
        }
    }

    /**
     * @return array<string, mixed>
     */
    #[JsonRpc\Parameter]
    public function capabilities(): array
    {
        return $this->capabilities;
    }
}
