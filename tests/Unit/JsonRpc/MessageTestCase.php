<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\JsonRpc;

use Maartenpaauw\Mcp\JsonRpc\Message;
use Maartenpaauw\Mcp\JsonRpc\Request;
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
    public function it_serializes_the_json_rpc_request(Request $request, array $expected): void
    {
        $actualJson = json_encode(value: $request);
        $expectedJson = json_encode(value: $expected);

        self::assertJsonStringEqualsJsonString(expectedJson: $expectedJson, actualJson: $actualJson);
    }

    /**
     * @return array<array-key, array{
     *     0: Request,
     *     1: array<array-key, mixed>,
     * }>
     */
    abstract public static function serializedMessageDataProvider(): array;
}
