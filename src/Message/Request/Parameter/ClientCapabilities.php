<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class ClientCapabilities implements Parameter
{
    public function __construct(
        private ?ClientExperimentalCapability $experimental = null,
        private ?ClientRootsCapability $roots = null,
        private ?ClientSamplingCapability $sampling = null,
        private ?ClientElicitationCapability $elicitation = null,
    ) {}

    #[JsonRpc\Parameter]
    public function experimental(): ?ClientExperimentalCapability
    {
        return $this->experimental;
    }

    #[JsonRpc\Parameter]
    public function roots(): ?ClientRootsCapability
    {
        return $this->roots;
    }

    #[JsonRpc\Parameter]
    public function sampling(): ?ClientSamplingCapability
    {
        return $this->sampling;
    }

    #[JsonRpc\Parameter]
    public function elicitation(): ?ClientElicitationCapability
    {
        return $this->elicitation;
    }
}
