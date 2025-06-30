<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

use Maartenpaauw\Mcp\JsonRpc;

final readonly class Argument implements Parameter
{
    public function __construct(
        private Name $name,
        private Value $value,
    ) {}

    #[JsonRpc\Parameter]
    public function name(): Name
    {
        return $this->name;
    }

    #[JsonRpc\Parameter]
    public function value(): Value
    {
        return $this->value;
    }
}
