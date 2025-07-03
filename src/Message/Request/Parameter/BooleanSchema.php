<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class BooleanSchema implements PrimitiveSchema
{
    public function __construct(
        private ?Title $title = null,
        private ?Description $description = null,
        private ?bool $default = null,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'boolean');
    }

    #[JsonRpc\Parameter]
    public function title(): ?Title
    {
        return $this->title;
    }

    #[JsonRpc\Parameter]
    public function description(): ?Description
    {
        return $this->description;
    }

    #[JsonRpc\Parameter]
    public function default(): ?bool
    {
        return $this->default;
    }
}
