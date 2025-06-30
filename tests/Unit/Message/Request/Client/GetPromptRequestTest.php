<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\GetPromptRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: GetPromptRequest::class)]
final class GetPromptRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $name = new Name(value: 'code_review');
        $arguments = new Arguments(
            new Argument(
                name: new Name(value: 'code'),
                value: new Value(value: "def hello():\\n    print('world')"),
            ),
        );

        $getPromptRequest = new GetPromptRequest(
            name: $name,
            arguments: $arguments,
        );

        self::assertSame(expected: $name, actual: $getPromptRequest->getName());
        self::assertSame(expected: $arguments, actual: $getPromptRequest->getArguments());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new GetPromptRequest(
                    name: new Name(value: 'code_review'),
                    arguments: new Arguments(
                        new Argument(
                            name: new Name(value: 'code'),
                            value: new Value(value: "def hello():\\n    print('world')"),
                        ),
                    ),
                ),
                [
                    'name' => 'code_review',
                    'arguments' => [
                        'code' => "def hello():\\n    print('world')",
                    ],
                ],
            ],
        ];
    }

    #[Override]
    public static function requestMethodDataProvider(): array
    {
        return [
            [
                new GetPromptRequest(
                    name: new Name(value: 'code_review'),
                    arguments: new Arguments(
                        new Argument(
                            name: new Name(value: 'code'),
                            value: new Value(value: "def hello():\\n    print('world')"),
                        ),
                    ),
                ),
                Method::GetPrompt,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new GetPromptRequest(
                    name: new Name(value: 'code_review'),
                    arguments: new Arguments(
                        new Argument(
                            name: new Name(value: 'code'),
                            value: new Value(value: "def hello():\\n    print('world')"),
                        ),
                    ),
                ),
                [
                    'name' => new Name(value: 'code_review'),
                    'arguments' => new Arguments(
                        new Argument(
                            name: new Name(value: 'code'),
                            value: new Value(value: "def hello():\\n    print('world')"),
                        ),
                    ),
                ],
            ],
        ];
    }
}
