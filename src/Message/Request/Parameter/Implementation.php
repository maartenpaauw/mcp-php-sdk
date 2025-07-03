<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class Implementation implements Parameter
{
    public function __construct(
        private Name $name,
        private Version $version,
        private ?Title $title = null,
    ) {}

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function version(): Version
    {
        return $this->version;
    }

    #[JsonRpc\Parameter]
    public function title(): ?Title
    {
        return $this->title;
    }
}
