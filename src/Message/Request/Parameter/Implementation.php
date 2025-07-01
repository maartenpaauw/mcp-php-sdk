<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\JsonRpc;

final readonly class Implementation implements Parameter
{
    public function __construct(
        private Name $name,
        private string $version,
        private ?string $title = null,
    )
    {
        if ($this->version === '') {
            throw new InvalidArgumentException(message: 'Version cannot be empty');
        }

        if ($this->title === '') {
            throw new InvalidArgumentException(message: 'Title cannot be empty');
        }
    }

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function version(): string
    {
        return $this->version;
    }

    #[JsonRpc\Parameter]
    public function title(): ?string
    {
        return $this->title;
    }
}
