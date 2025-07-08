<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;

trait HasUri
{
    #[JsonRpc\Parameter]
    public function uri(): Uri
    {
        return $this->uri;
    }
}
