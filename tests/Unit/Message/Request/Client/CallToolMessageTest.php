<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\Client\CallToolRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: CallToolRequest::class)]
final class CallToolMessageTest extends RequestTestCase
{
    #[Test]
    public function it_should_throw_an_invalid_argument_exception_when_an_argument_key_is_not_a_string(): void
    {
        self::expectException(exception: InvalidArgumentException::class);
        self::expectExceptionMessage(message: 'Argument name must be a string');

        new CallToolRequest(
            name: new Name(value: 'get_weather'),
            arguments: [
                1 => 'Oegstgeest',
            ],
        );
    }

    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $name = new Name(value: 'get_weather');
        $arguments = [
            'location' => 'Oegstgeest',
        ];

        $callToolRequest = new CallToolRequest(
            name: $name,
            arguments: $arguments,
        );

        self::assertSame(expected: $name, actual: $callToolRequest->name());
        self::assertSame(expected: $arguments, actual: $callToolRequest->arguments());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new CallToolRequest(
                    name: new Name(value: 'get_weather'),
                    arguments: [
                        'location' => 'Oegstgeest',
                    ],
                ),
                [
                    'name' => 'get_weather',
                    'arguments' => [
                        'location' => 'Oegstgeest',
                    ],
                ],
            ],
            [
                new CallToolRequest(
                    name: new Name(value: 'get_weather'),
                ),
                [
                    'name' => 'get_weather',
                ],
            ],
        ];
    }

    #[Override]
    public static function requestMethodDataProvider(): array
    {
        return [
            [
                new CallToolRequest(
                    name: new Name(value: 'get_weather'),
                    arguments: [
                        'location' => 'Oegstgeest',
                    ],
                ),
                Method::CallTool,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new CallToolRequest(
                    name: new Name(value: 'get_weather'),
                    arguments: [
                        'location' => 'Oegstgeest',
                    ],
                ),
                [
                    'name' => new Name(value: 'get_weather'),
                    'arguments' => [
                        'location' => 'Oegstgeest',
                    ],
                ],
            ],
            [
                new CallToolRequest(
                    name: new Name(value: 'get_weather'),
                ),
                [
                    'name' => new Name(value: 'get_weather'),
                ],
            ],
        ];
    }
}
