<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\JsonRpc;

use Maartenpaauw\Mcp\JsonRpc\Message;
use PHPUnit\Framework\Attributes\CoversClassesThatImplementInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClassesThatImplementInterface(interfaceName: Message::class)]
class RequestTestCase extends TestCase
{
    #[Test]
    #[DataProvider('fixtureDataProvider')]
    public function it_serializes_the_json_rpc_request(string $request, string $fixture): void
    {
        $actualJson = json_encode(value: require_once __DIR__ . '/fixtures/' . $request);
        $expectedJson = json_encode(value: json_decode(json: file_get_contents(filename: __DIR__ . '/fixtures/' . $fixture)));

        self::assertJsonStringEqualsJsonString(expectedJson: $expectedJson, actualJson: $actualJson);
    }

    public static function fixtureDataProvider(): array
    {
        return [
            ['call_tool_request.php', 'call_tool_request.json'],
            ['call_tool_request_with_arguments.php', 'call_tool_request_with_arguments.json'],
            ['complete_prompt_request.php', 'complete_prompt_request.json'],
            ['complete_prompt_with_context_request.php', 'complete_prompt_with_context_request.json'],
            ['complete_resource_request.php', 'complete_resource_request.json'],
            ['complete_resource_with_context_request.php', 'complete_resource_with_context_request.json'],
            ['list_prompts_request.php', 'list_prompts_request.json'],
            ['list_prompts_with_cursor_request.php', 'list_prompts_with_cursor_request.json'],
            ['list_resource_templates_request.php', 'list_resource_templates_request.json'],
            ['list_resource_templates_with_cursor_request.php', 'list_resource_templates_with_cursor_request.json'],
            ['list_resources_request.php', 'list_resources_request.json'],
            ['list_resources_with_cursor_request.php', 'list_resources_with_cursor_request.json'],
            ['list_tools_request.php', 'list_tools_request.json'],
            ['list_tools_with_cursor_request.php', 'list_tools_with_cursor_request.json'],
            ['read_resource_request.php', 'read_resource_request.json'],
            ['set_level_request_debug.php', 'set_level_request_debug.json'],
            ['set_level_request_emergency.php', 'set_level_request_emergency.json'],
            ['subscribe_request.php', 'subscribe_request.json'],
            ['unsubscribe_request.php', 'unsubscribe_request.json'],
        ];
    }
}
