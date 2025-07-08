<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasUri;

final readonly class ResourceTemplateReference implements Parameter
{
    use HasUri;

    public function __construct(
        private Uri $uri,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'ref/resource');
    }
}
