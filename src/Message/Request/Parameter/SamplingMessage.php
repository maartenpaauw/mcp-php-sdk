<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class SamplingMessage implements Parameter
{
    public function __construct(
        private Role $role,
        private TextContent | ImageContent | AudioContent $content,
    ) {}

    #[JsonRpc\Parameter]
    public function role(): Role
    {
        return $this->role;
    }

    #[JsonRpc\Parameter]
    public function content(): TextContent | ImageContent | AudioContent
    {
        return $this->content;
    }
}
