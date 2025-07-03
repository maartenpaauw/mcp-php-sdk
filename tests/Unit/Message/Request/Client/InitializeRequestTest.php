<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\InitializeRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientCapabilities;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientRootsCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientSamplingCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\Implementation;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProtocolVersion;
use Maartenpaauw\Mcp\Message\Request\Parameter\Version;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: InitializeRequest::class)]
final class InitializeRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $protocolVersion = ProtocolVersion::v2025_06_18;

        $clientCapabilities = new ClientCapabilities(
            roots: new ClientRootsCapability(
                listChanged: true,
            ),
            sampling: new ClientSamplingCapability(),
        );

        $clientInformation = new Implementation(
            name: new Name(value: 'ExampleClient'),
            version: new Version(value: '1.0.0'),
        );

        $initializeRequest = new InitializeRequest(
            protocolVersion: $protocolVersion,
            clientCapabilities: $clientCapabilities,
            clientInformation: $clientInformation,
        );

        self::assertSame(expected: $protocolVersion, actual: $initializeRequest->protocolVersion());
        self::assertSame(expected: $clientCapabilities, actual: $initializeRequest->clientCapabilities());
        self::assertSame(expected: $clientInformation, actual: $initializeRequest->clientInformation());
    }
}
