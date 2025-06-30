<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\SetLevelRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\LoggingLevel;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: SetLevelRequest::class)]
final class SetLevelRequestTest extends RequestTestCase
{
    #[Test]
    #[DataProvider('loggingLevelDataProvider')]
    public function it_should_be_possible_to_receive_the_given_parameters(LoggingLevel $loggingLevel): void
    {
        $readResourceRequest = new SetLevelRequest(loggingLevel: $loggingLevel);

        self::assertSame(expected: $loggingLevel, actual: $readResourceRequest->loggingLevel());
    }

    public static function loggingLevelDataProvider(): array
    {
        return [
            [LoggingLevel::Debug],
            [LoggingLevel::Info],
            [LoggingLevel::Notice],
            [LoggingLevel::Warning],
            [LoggingLevel::Error],
            [LoggingLevel::Critical],
            [LoggingLevel::Alert],
            [LoggingLevel::Emergency],
        ];
    }
}
