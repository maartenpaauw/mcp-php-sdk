<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

use Maartenpaauw\Mcp\JsonRpc;

#[JsonRpc\Method(Method::Ping)]
final readonly class PingRequest implements Client\Request, Server\Request {}
