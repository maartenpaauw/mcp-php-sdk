<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\LoggingLevel;

#[JsonRpc\Method(Method::SetLevel)]
final readonly class SetLevelRequest implements Request
{
    public function __construct(
        private LoggingLevel $loggingLevel,
    ) {}

    #[JsonRpc\Parameter(alias: 'level')]
    public function loggingLevel(): LoggingLevel
    {
        return $this->loggingLevel;
    }
}
