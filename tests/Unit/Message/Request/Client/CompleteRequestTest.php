<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\CompleteRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Context;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\PromptReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: CompleteRequest::class)]
final class CompleteRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $reference = new PromptReference(
            name: new Name(value: 'code_review'),
        );

        $argument = new Argument(
            name: new Name(value: 'framework'),
            value: new Value(value: 'fla'),
        );

        $context = new Context(
            arguments: new Arguments(
                new Argument(
                    name: new Name(value: 'language'),
                    value: new Value(value: 'python'),
                ),
            ),
        );

        $completeRequest = new CompleteRequest(
            reference: $reference,
            argument: $argument,
            context: $context,
        );

        self::assertSame(expected: $reference, actual: $completeRequest->reference());
        self::assertSame(expected: $argument, actual: $completeRequest->argument());
        self::assertSame(expected: $context, actual: $completeRequest->context());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new CompleteRequest(
                    reference: new PromptReference(
                        name: new Name(value: 'code_review'),
                    ),
                    argument: new Argument(
                        name: new Name(value: 'language'),
                        value: new Value(value: 'py'),
                    ),
                ),
                [
                    'ref' => [
                        'type' => 'ref/prompt',
                        'name' => 'code_review',
                    ],
                    'argument' => [
                        'name' => 'language',
                        'value' => 'py',
                    ],
                ],
            ],
            [
                new CompleteRequest(
                    reference: new PromptReference(
                        name: new Name(value: 'code_review'),
                    ),
                    argument: new Argument(
                        name: new Name(value: 'framework'),
                        value: new Value(value: 'fla'),
                    ),
                    context: new Context(
                        arguments: new Arguments(
                            new Argument(
                                name: new Name(value: 'language'),
                                value: new Value(value: 'python'),
                            ),
                        ),
                    ),
                ),
                [
                    'ref' => [
                        'type' => 'ref/prompt',
                        'name' => 'code_review',
                    ],
                    'argument' => [
                        'name' => 'framework',
                        'value' => 'fla',
                    ],
                    'context' => [
                        'arguments' => [
                            'language' => 'python',
                        ],
                    ],
                ],
            ],
        ];
    }
}
