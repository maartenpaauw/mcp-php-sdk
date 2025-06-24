<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\JsonRpc;

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CallToolRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[Small]
#[CoversClass(className: Request::class)]
final class RequestTest extends MessageTestCase
{
    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new Request(
                    version: Version::v2_0,
                    identifier: new RequestIdentifier(1),
                    request: new CallToolRequest(
                        name: new Name(value: 'get_weather'),
                        arguments: [
                            'location' => 'Oegstgeest',
                        ],
                    ),
                ),
                [
                    'jsonrpc' => '2.0',
                    'id' => 1,
                    'method' => 'tools/call',
                    'params' => [
                        'name' => 'get_weather',
                        'arguments' => [
                            'location' => 'Oegstgeest',
                        ],
                    ],
                ],
            ],
        ];
    }
}
