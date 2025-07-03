<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta;

final readonly class ImageContent implements Parameter
{
    public function __construct(
        private Base64 $data,
        private MimeType $mimeType,
        private ?Annotations $annotations = null,
        private ?Meta $meta = null,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'image');
    }

    #[JsonRpc\Parameter]
    public function data(): Base64
    {
        return $this->data;
    }

    #[JsonRpc\Parameter]
    public function mimeType(): MimeType
    {
        return $this->mimeType;
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
