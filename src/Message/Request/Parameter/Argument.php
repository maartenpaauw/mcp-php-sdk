<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use JsonSerializable;
use Override;

final readonly class Argument implements JsonSerializable
{
    public function __construct(
        private Name $name,
        private Value $value,
    ) {}

    public function getName(): Name
    {
        return $this->name;
    }

    public function getValue(): Value
    {
        return $this->value;
    }

    /**
     * @return array{
     *     name: Name,
     *     value: Value,
     * }
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
