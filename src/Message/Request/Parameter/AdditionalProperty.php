<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class AdditionalProperty
{
    public function __construct(
        private ?Name $name = null,
        private ?Unknown $value = null,
    ) {
    }

    #[JsonRpc\Parameter]
    public function name(): ?Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function value(): ?Unknown
    {
        return $this->value;
    }
}
