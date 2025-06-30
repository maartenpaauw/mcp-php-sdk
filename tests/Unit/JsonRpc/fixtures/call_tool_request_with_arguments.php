<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CallToolRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CallToolRequest(
        name: new Name(value: 'get_weather'),
        arguments: [
            'location' => 'Oegstgeest',
        ],
    ),
);
