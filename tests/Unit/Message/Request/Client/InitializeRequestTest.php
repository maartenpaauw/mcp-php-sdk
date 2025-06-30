<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\InitializeRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientCapabilities;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientElicitationCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientRootsCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientSamplingCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\Implementation;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProtocolVersion;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(className: InitializeRequest::class)]
final class InitializeRequestTest extends RequestTestCase
{
    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new InitializeRequest(
                    protocolVersion: ProtocolVersion::v2025_06_18,
                    clientCapabilities: new ClientCapabilities(
                        roots: new ClientRootsCapability(
                            listChanged: true,
                        ),
                        sampling: new ClientSamplingCapability(),
                        elicitation: new ClientElicitationCapability(),
                    ),
                    clientInformation: new Implementation(
                        name: 'ExampleClient',
                        version: '1.0.0',
                        title: 'Example Client Display Name',
                    ),
                ),
                [
                    'protocolVersion' => '2025-06-18',
                    'capabilities' => [
                        'roots' => [
                            'listChanged' => true,
                        ],
                        'sampling' => (object) [],
                        'elicitation' => (object) [],
                    ],
                    'clientInfo' => [
                        'name' => 'ExampleClient',
                        'version' => '1.0.0',
                        'title' => 'Example Client Display Name',
                    ],
                ],
            ],
        ];
    }
}
