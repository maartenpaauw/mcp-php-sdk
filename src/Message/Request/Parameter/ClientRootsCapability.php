<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class ClientRootsCapability implements Parameter
{
    public function __construct(
        private ?bool $listChanged = null,
    ) {}

    #[JsonRpc\Parameter]
    public function listChanged(): ?bool
    {
        return $this->listChanged;
    }
}
