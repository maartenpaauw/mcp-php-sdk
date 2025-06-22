<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message;

use Maartenpaauw\Mcp\Message\Message;
use PHPUnit\Framework\Attributes\CoversClassesThatImplementInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClassesThatImplementInterface(interfaceName: Message::class)]
abstract class MessageTestCase extends TestCase
{
    #[Test]
    #[DataProvider('serializedMessageDataProvider')]
    public function it_should_serialize_the_request_correctly(Message $message, array $expectedData): void
    {
        self::assertJsonStringEqualsJsonString(
            expectedJson: json_encode(value: $expectedData),
            actualJson: json_encode(value: $message),
        );
    }

    /**
     * @return array<array-key, array{
     *     0: Message,
     *     1: array<string, mixed>,
     * }>
     */
    abstract public static function serializedMessageDataProvider(): array;
}
