<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class ClientCapabilities implements JsonSerializable
{
    public function __construct(
        private ?ClientExperimentalCapability $experimental = null,
        private ?ClientRootsCapability $roots = null,
        private ?ClientSamplingCapability $sampling = null,
        private ?ClientElicitationCapability $elicitation = null,
    ) {}

    public function experimental(): ?ClientExperimentalCapability
    {
        return $this->experimental;
    }

    public function roots(): ?ClientRootsCapability
    {
        return $this->roots;
    }

    public function sampling(): ?ClientSamplingCapability
    {
        return $this->sampling;
    }

    public function elicitation(): ?ClientElicitationCapability
    {
        return $this->elicitation;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->experimental !== null) {
            $data['experimental'] = $this->experimental;
        }

        if ($this->roots !== null) {
            $data['roots'] = $this->roots;
        }

        if ($this->sampling !== null) {
            $data['sampling'] = $this->sampling;
        }

        if ($this->elicitation !== null) {
            $data['elicitation'] = $this->elicitation;
        }

        return $data;
    }
}
