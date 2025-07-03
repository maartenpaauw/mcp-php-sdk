<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request;

enum Method: string
{
    case CallTool = 'tools/call';
    case Complete = 'completion/complete';
    case CreateElicitation = 'elicitation/create';
    case CreateMessage = 'sampling/createMessage';
    case GetPrompt = 'prompts/get';
    case Initialize = 'initialize';
    case ListPrompts = 'prompts/list';
    case ListResourceTemplates = 'resources/templates/list';
    case ListResources = 'resources/list';
    case ListRoots = 'roots/list';
    case ListTools = 'tools/list';
    case Ping = 'ping';
    case ReadResource = 'resources/read';
    case SetLevel = 'logging/setLevel';
    case Subscribe = 'resources/subscribe';
    case Unsubscribe = 'resources/unsubscribe';
}
