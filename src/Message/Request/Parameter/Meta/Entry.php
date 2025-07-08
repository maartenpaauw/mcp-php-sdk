<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter\Meta;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Parameter;
use Maartenpaauw\Mcp\Message\Request\Parameter\Unknown;

final readonly class Entry implements Parameter
{
    public function __construct(
        private Key $key,
        private Unknown $value,
    ) {}

    #[JsonRpc\Parameter]
    public function key(): Key
    {
        return $this->key;
    }

    #[JsonRpc\Parameter]
    public function value(): Unknown
    {
        return $this->value;
    }
}
