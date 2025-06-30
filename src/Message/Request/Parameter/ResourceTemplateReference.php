<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class ResourceTemplateReference implements Parameter
{
    public function __construct(
        private Uri $uri,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): string
    {
        return 'ref/resource';
    }

    #[JsonRpc\Parameter]
    public function uri(): Uri
    {
        return $this->uri;
    }
}
