<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\LoggingLevel;
use Override;

final readonly class SetLevelRequest extends BaseRequest implements Request
{
    public function __construct(
        private LoggingLevel $loggingLevel,
    ) {}

    public function getLoggingLevel(): LoggingLevel
    {
        return $this->loggingLevel;
    }

    #[Override]
    public function getMethod(): Method
    {
        return Method::SetLevel;
    }

    #[Override]
    public function getParameters(): array
    {
        return [
            'level' => $this->loggingLevel,
        ];
    }
}
