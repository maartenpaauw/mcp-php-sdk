<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\InitializeRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientCapabilities;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientRootsCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\ClientSamplingCapability;
use Maartenpaauw\Mcp\Message\Request\Parameter\Implementation;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProtocolVersion;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new InitializeRequest(
        protocolVersion: ProtocolVersion::v2025_06_18,
        clientCapabilities: new ClientCapabilities(
            roots: new ClientRootsCapability(
                listChanged: true,
            ),
            sampling: new ClientSamplingCapability(),
        ),
        clientInformation: new Implementation(
            name: new Name(value: 'ExampleClient'),
            version: '1.0.0',
        ),
    ),
);
