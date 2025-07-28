<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;

trait HasMetadataWithProgressToken
{
    #[JsonRpc\Parameter(alias: '_meta')]
    public function meta(): ?MetaWithProgressToken
    {
        return $this->meta;
    }
}
