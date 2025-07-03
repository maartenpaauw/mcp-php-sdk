<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class ModelHint implements Parameter
{
    public function __construct(
        private ?Name $name = null,
    ) {
    }

    #[JsonRpc\Parameter]
    public function name(): ?Name
    {
        return $this->name;
    }
}
