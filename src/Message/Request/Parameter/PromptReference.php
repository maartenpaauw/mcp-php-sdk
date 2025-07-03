<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class PromptReference implements Parameter
{
    public function __construct(
        private Name $name,
        private ?Title $title = null,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'ref/prompt');
    }

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function title(): ?Title
    {
        return $this->title;
    }
}
