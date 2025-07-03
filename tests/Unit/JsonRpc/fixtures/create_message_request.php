<?php

declare(strict_types=1);

use Maartenpaauw\Mcp\JsonRpc\Request;
use Maartenpaauw\Mcp\JsonRpc\RequestIdentifier;
use Maartenpaauw\Mcp\JsonRpc\Version;
use Maartenpaauw\Mcp\Message\Request\Client\CreateMessageRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\MaxTokens;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelHint;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelHints;
use Maartenpaauw\Mcp\Message\Request\Parameter\ModelPreferences;
use Maartenpaauw\Mcp\Message\Request\Parameter\Name;
use Maartenpaauw\Mcp\Message\Request\Parameter\Priority;
use Maartenpaauw\Mcp\Message\Request\Parameter\Role;
use Maartenpaauw\Mcp\Message\Request\Parameter\SamplingMessage;
use Maartenpaauw\Mcp\Message\Request\Parameter\SamplingMessages;
use Maartenpaauw\Mcp\Message\Request\Parameter\SystemPrompt;
use Maartenpaauw\Mcp\Message\Request\Parameter\Text;
use Maartenpaauw\Mcp\Message\Request\Parameter\TextContent;

return new Request(
    version: Version::v2_0,
    identifier: new RequestIdentifier(value: 1),
    request: new CreateMessageRequest(
        samplingMessages: new SamplingMessages(
            new SamplingMessage(
                role: Role::User,
                content: new TextContent(
                    text: new Text(value: 'What is the capital of France?'),
                ),
            ),
        ),
        modelPreferences: new ModelPreferences(
            modelHints: new ModelHints(
                new ModelHint(
                    name: new Name(value: 'claude-3-sonnet'),
                ),
            ),
            speedPriority: new Priority(value: 0.5),
            intelligencePriority: new Priority(value: 0.8),
        ),
        systemPrompt: new SystemPrompt(value: 'You are a helpful assistant.'),
        maxTokens: new MaxTokens(value: 100),
    ),
);
