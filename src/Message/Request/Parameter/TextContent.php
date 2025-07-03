<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta;

final readonly class TextContent implements Parameter
{
    public function __construct(
        private Text $text,
        private ?Annotations $annotations = null,
        private ?Meta $meta = null,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'text');
    }

    #[JsonRpc\Parameter]
    public function text(): Text
    {
        return $this->text;
    }

    #[JsonRpc\Parameter]
    public function annotations(): ?Annotations
    {
        return $this->annotations;
    }

    #[JsonRpc\Parameter(alias: '_meta')]
    public function meta(): ?Meta
    {
        return $this->meta;
    }
}
