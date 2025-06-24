<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Parameter;

use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Context;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClass(className: Context::class)]
final class ContextTest extends TestCase
{
    #[Test]
    public function it_should_serialize_its_arguments_correctly(): void
    {
        $context = new Context(
            arguments: new Arguments(
                new Argument(
                    name: new Name(value: 'language'),
                    value: new Value(value: 'python'),
                ),
            ),
        );

        $expectedJson = json_encode(value: [
            'arguments' => [
                'language' => 'python',
            ],
        ]);

        $actualJson = json_encode(value: $context);

        self::assertJsonStringEqualsJsonString(expectedJson: $expectedJson, actualJson: $actualJson);
    }
}
