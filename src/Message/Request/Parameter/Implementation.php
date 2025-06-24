<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use Override;

final readonly class Implementation implements JsonSerializable
{
    public function __construct(
        private string $name,
        private string $version,
        private ?string $title = null,
    )
    {
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

    public function getName(): string
    {
        return $this->name;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(
            array: [
                'name' => $this->name,
                'version' => $this->version,
                'title' => $this->title,
            ],
            callback: new ParameterFilter(),
        );
    }
}
