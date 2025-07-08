<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\JsonRpc;
use Maartenpaauw\Mcp\Message\Request\HasMetadataWithProgressToken;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\LoggingLevel;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\MetaWithProgressToken;

#[JsonRpc\Method(Method::SetLevel)]
final readonly class SetLevelRequest implements Request
{
    use HasMetadataWithProgressToken;

    public function __construct(
        private LoggingLevel $loggingLevel,
        private ?MetaWithProgressToken $meta = null,
    ) {}

    #[JsonRpc\Parameter(alias: 'level')]
    public function loggingLevel(): LoggingLevel
    {
        return $this->loggingLevel;
    }
}
