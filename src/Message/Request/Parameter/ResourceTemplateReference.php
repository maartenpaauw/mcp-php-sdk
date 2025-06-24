<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class ResourceTemplateReference implements JsonSerializable
{
    public function __construct(
        private Uri $uri,
    ) {}

    public function getUri(): Uri
    {
        return $this->uri;
    }

    /**
     * @return array{
     *     type: string,
     *     uri: Uri,
     * }
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'type' => 'ref/resource',
            'uri' => $this->uri,
        ];
    }
}
