<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use InvalidArgumentException;
use JsonSerializable;
use Override;

final readonly class Implementation implements JsonSerializable
{
    public function __construct(
        private string $name,
        private string $version,
        private ?string $title = null,
    ) {
        if ($this->name === '') {
            throw new InvalidArgumentException(message: 'Name cannot be empty');
        }

        if ($this->version === '') {
            throw new InvalidArgumentException(message: 'Version cannot be empty');
        }

        if ($this->title === '') {
            throw new InvalidArgumentException(message: 'Title cannot be empty');
        }
    }

    public function name(): string
    {
        return $this->name;
    }

    public function title(): ?string
    {
        return $this->title;
    }

    public function version(): string
    {
        return $this->version;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(array: [
            'name' => $this->name,
            'version' => $this->version,
            'title' => $this->title,
        ]);
    }
}
