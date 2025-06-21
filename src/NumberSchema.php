<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

use Override;

final readonly class NumberSchema implements PrimitiveSchema
{
    public function __construct(
        private ?string $title = null,
        private ?string $description = null,
        private ?int $minimum = null,
        private ?int $maximum = null,
    ) {}

    public function title(): ?string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function minimum(): ?int
    {
        return $this->minimum;
    }

    public function maximum(): ?int
    {
        return $this->maximum;
    }

    #[Override]
    public function jsonSerialize(): array
    {
        return array_filter(array: [
            'type' => 'number', // TODO: It can be integer as well... Should it be two separate classes?
            'title' => $this->title,
            'description' => $this->description,
            'minimum' => $this->minimum,
            'maximum' => $this->maximum,
        ]);
    }
}
