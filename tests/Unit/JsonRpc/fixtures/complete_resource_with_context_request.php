<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CompleteRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Arguments;
use Maartenpaauw\Mcp\Message\Request\Parameter\Context;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\ResourceTemplateReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\Uri;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CompleteRequest(
        reference: new ResourceTemplateReference(
            uri: new Uri(value: 'github://repos/{owner}/{repo}'),
        ),
        argument: new Argument(
            name: new Name(value: 'owner'),
            value: new Value(value: 'model'),
        ),
        context: new Context(
            arguments: new Arguments(
                new Argument(
                    name: new Name(value: 'owner'),
                    value: new Value(value: 'maartenpaauw'),
                ),
            ),
        ),
    ),
);
