<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class ClientRootsCapability implements JsonSerializable
{
    public function __construct(
        private bool $listChanged,
    ) {}

    public function listChanged(): bool
    {
        return $this->listChanged;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'listChanged' => $this->listChanged,
        ];
    }
}
