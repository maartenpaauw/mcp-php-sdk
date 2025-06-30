<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\UnsubscribeRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new UnsubscribeRequest(
        uri: new Uri(value: 'file:///project/src/main.rs'),
    ),
);
