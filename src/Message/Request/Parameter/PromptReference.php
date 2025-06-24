<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class PromptReference implements JsonSerializable
{
    public function __construct(
        private Name $name,
        private ?Title $title = null,
    ) {}

    public function getName(): Name
    {
        return $this->name;
    }

    public function getTitle(): ?Title
    {
        return $this->title;
    }

    /**
     * @return array{
     *     type: string,
     *     name: Name,
     *     title?: Title
     * }
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(
            array: [
                'type' => 'ref/prompt',
                'name' => $this->name,
                'title' => $this->title,
            ],
            callback: new ParameterFilter(),
        );
    }
}
