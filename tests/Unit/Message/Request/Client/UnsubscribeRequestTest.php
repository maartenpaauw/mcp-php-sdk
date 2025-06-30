<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\UnsubscribeRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: UnsubscribeRequest::class)]
final class UnsubscribeRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $uri = new Uri(value: 'file:///project/src/main.rs');

        $readResourceRequest = new UnsubscribeRequest(uri: $uri);

        self::assertSame(expected: $uri, actual: $readResourceRequest->getUri());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new UnsubscribeRequest(
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
                new UnsubscribeRequest(
                    uri: new Uri(value: 'file:///project/src/main.rs'),
                ),
                Method::Unsubscribe,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new UnsubscribeRequest(
                    uri: new Uri(value: 'file:///project/src/main.rs'),
                ),
                [
                    'uri' => new Uri(value: 'file:///project/src/main.rs'),
                ],
            ],
        ];
    }
}
