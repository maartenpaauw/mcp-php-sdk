<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class NumberSchema implements PrimitiveSchema
{
    public function __construct(
        private ?Title $title = null,
        private ?Description $description = null,
        private ?int $minimum = null,
        private ?int $maximum = null,
    ) {}

    #[JsonRpc\Parameter]
    public function type(): Type
    {
        return new Type(value: 'number'); // TODO: It can be integer as well... Should it be two separate classes?
    }

    #[JsonRpc\Parameter]
    public function title(): ?Title
    {
        return $this->title;
    }

    #[JsonRpc\Parameter]
    public function description(): ?Description
    {
        return $this->description;
    }

    #[JsonRpc\Parameter]
    public function minimum(): ?int
    {
        return $this->minimum;
    }

    #[JsonRpc\Parameter]
    public function maximum(): ?int
    {
        return $this->maximum;
    }
}
