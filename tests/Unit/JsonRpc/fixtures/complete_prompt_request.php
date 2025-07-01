<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CompleteRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Argument;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\PromptReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CompleteRequest(
        reference: new PromptReference(
            name: new Name(value: 'code_review'),
        ),
        argument: new Argument(
            name: new Name(value: 'language'),
            value: new Value(value: 'py'),
        ),
    ),
);
