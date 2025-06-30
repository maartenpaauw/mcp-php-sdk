<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;

final readonly class BooleanSchema implements PrimitiveSchema
{
    public function __construct(
        private ?string $title = null,
        private ?string $description = null,
        private ?bool $default = null,
    ) {
        if ($this->title === '') {
            throw new InvalidArgumentException(message: 'Title cannot be empty');
        }

        if ($this->description === '') {
            throw new InvalidArgumentException(message: 'Description cannot be empty');
        }
    }

    #[JsonRpc\Parameter]
    public function type(): string
    {
        return 'boolean';
    }

    #[JsonRpc\Parameter]
    public function title(): ?string
    {
        return $this->title;
    }

    #[JsonRpc\Parameter]
    public function description(): ?string
    {
        return $this->description;
    }

    #[JsonRpc\Parameter]
    public function default(): ?bool
    {
        return $this->default;
    }
}
