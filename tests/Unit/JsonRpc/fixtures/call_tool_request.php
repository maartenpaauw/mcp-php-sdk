<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CallToolRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Entries;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Entry;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Key;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Meta;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\ProgressToken;
use Maartenpaauw\Mcp\Message\Request\Parameter\Unknown;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CallToolRequest(
        name: new Name(value: 'get_weather'),
        meta: new Meta(
            progressToken: new ProgressToken(value: 'abc123'),
            entries: new Entries(
                new Entry(
                    key: new Key(value: 'customField'),
                    value: new Unknown(value: 'customValue'),
                ),
                new Entry(
                    key: new Key(value: 'anotherField'),
                    value: new Unknown(value: 123),
                ),
            )
        ),
    ),
);
