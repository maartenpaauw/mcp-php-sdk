<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\SetLevelRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\LoggingLevel;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: SetLevelRequest::class)]
final class SetLevelRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $readResourceRequest = new SetLevelRequest(loggingLevel: LoggingLevel::Critical);

        self::assertSame(expected: LoggingLevel::Critical, actual: $readResourceRequest->getLoggingLevel());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Debug),
                ['level' => 'debug'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Info),
                ['level' => 'info'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Notice),
                ['level' => 'notice'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Warning),
                ['level' => 'warning'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Error),
                ['level' => 'error'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Critical),
                ['level' => 'critical'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Alert),
                ['level' => 'alert'],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Emergency),
                ['level' => 'emergency'],
            ],
        ];
    }

    #[Override]
    public static function requestMethodDataProvider(): array
    {
        return [
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Debug),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Info),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Notice),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Warning),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Error),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Critical),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Alert),
                Method::SetLevel,
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Emergency),
                Method::SetLevel,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Debug),
                ['level' => LoggingLevel::Debug],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Info),
                ['level' => LoggingLevel::Info],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Notice),
                ['level' => LoggingLevel::Notice],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Warning),
                ['level' => LoggingLevel::Warning],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Error),
                ['level' => LoggingLevel::Error],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Critical),
                ['level' => LoggingLevel::Critical],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Alert),
                ['level' => LoggingLevel::Alert],
            ],
            [
                new SetLevelRequest(loggingLevel: LoggingLevel::Emergency),
                ['level' => LoggingLevel::Emergency],
            ],
        ];
    }
}
