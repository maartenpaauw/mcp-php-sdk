<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Client\Request;

use Maartenpaauw\Mcp\LoggingLevel;
use Maartenpaauw\Mcp\Message\BaseRequest;
use Maartenpaauw\Mcp\Message\Method;
use Override;

final readonly class SetLevelRequest extends BaseRequest
{
    public function __construct(
        private LoggingLevel $loggingLevel,
    ) {}

    public function loggingLevel(): LoggingLevel
    {
        return $this->loggingLevel;
    }

    #[Override]
    public function method(): Method
    {
        return Method::SetLevel;
    }

    #[Override]
    public function parameters(): array
    {
        return [
            'level' => $this->loggingLevel,
        ];
    }
}
