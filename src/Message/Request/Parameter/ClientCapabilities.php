<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;
use stdClass;

final readonly class ClientCapabilities implements JsonSerializable
{
    public function __construct(
        private ?ClientExperimentalCapability $experimental = null,
        private ?ClientRootsCapability $roots = null,
        private ?ClientSamplingCapability $sampling = null,
        private ?ClientElicitationCapability $elicitation = null,
    ) {}

    public function getExperimental(): ?ClientExperimentalCapability
    {
        return $this->experimental;
    }

    public function getRoots(): ?ClientRootsCapability
    {
        return $this->roots;
    }

    public function getSampling(): ?ClientSamplingCapability
    {
        return $this->sampling;
    }

    public function getElicitation(): ?ClientElicitationCapability
    {
        return $this->elicitation;
    }

    /**
     * @return array<string, JsonSerializable>|stdClass
     */
    #[Override]
    public function jsonSerialize(): array | stdClass
    {
        $data = array_filter(
            array: [
                'experimental' => $this->experimental,
                'roots' => $this->roots,
                'sampling' => $this->sampling,
                'elicitation' => $this->elicitation,
            ],
            callback: new ParameterFilter(),
        );

        if ($data !== []) {
            return $data;
        }

        return new stdClass();
    }
}
