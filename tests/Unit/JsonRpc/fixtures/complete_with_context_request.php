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
use Maartenpaauw\Mcp\Message\Request\Parameter\PromptReference;
use Maartenpaauw\Mcp\Message\Request\Parameter\Title;
use Maartenpaauw\Mcp\Message\Request\Parameter\Value;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CompleteRequest(
        reference: new PromptReference(
            name: new Name(value: 'code_review'),
            title: new Title(value: 'Code Review'),
        ),
        argument: new Argument(
            name: new Name(value: 'framework'),
            value: new Value(value: 'fla'),
        ),
        context: new Context(
            new Arguments(
                new Argument(
                    name: new Name(value: 'language'),
                    value: new Value(value: 'python'),
                ),
            ),
        ),
    ),
);
