<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class Annotations implements Parameter
{
    public function __construct(
        private ?Audience $audience = null,
        private ?Priority $priority = null,
        private ?LastModified $lastModified = null,
    ) {}

    #[JsonRpc\Parameter]
    public function audience(): ?Audience
    {
        return $this->audience;
    }

    #[JsonRpc\Parameter]
    public function priority(): ?Priority
    {
        return $this->priority;
    }

    #[JsonRpc\Parameter]
    public function lastModified(): ?LastModified
    {
        return $this->lastModified;
    }
}
