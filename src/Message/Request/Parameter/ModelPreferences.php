<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class ModelPreferences implements Parameter
{
    public function __construct(
        private ?ModelHints $modelHints = null,
        private ?Priority $costPriority = null,
        private ?Priority $speedPriority = null,
        private ?Priority $intelligencePriority = null,
    ) {}

    #[JsonRpc\Parameter(alias: 'hints')]
    public function modelHints(): ?ModelHints
    {
        return $this->modelHints;
    }

    #[JsonRpc\Parameter]
    public function costPriority(): ?Priority
    {
        return $this->costPriority;
    }

    #[JsonRpc\Parameter]
    public function speedPriority(): ?Priority
    {
        return $this->speedPriority;
    }

    #[JsonRpc\Parameter]
    public function intelligencePriority(): ?Priority
    {
        return $this->intelligencePriority;
    }
}
