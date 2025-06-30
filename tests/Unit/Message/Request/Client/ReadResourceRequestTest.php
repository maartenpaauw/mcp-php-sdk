<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\ReadResourceRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: ReadResourceRequest::class)]
final class ReadResourceRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $uri = new Uri(value: 'file:///project/src/main.rs');

        $readResourceRequest = new ReadResourceRequest(uri: $uri);

        self::assertSame(expected: $uri, actual: $readResourceRequest->getUri());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new ReadResourceRequest(
                    uri: new Uri(value: 'file:///project/src/main.rs'),
                ),
                [
                    'uri' => 'file:///project/src/main.rs',
                ],
            ],
        ];
    }

    #[Override]
    public static function requestMethodDataProvider(): array
    {
        return [
            [
                new ReadResourceRequest(
                    uri: new Uri(value: 'file:///project/src/main.rs'),
                ),
                Method::ReadResource,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new ReadResourceRequest(
                    uri: new Uri(value: 'file:///project/src/main.rs'),
                ),
                [
                    'uri' => new Uri(value: 'file:///project/src/main.rs'),
                ],
            ],
        ];
    }
}
