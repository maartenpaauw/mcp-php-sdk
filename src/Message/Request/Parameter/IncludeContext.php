<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

enum IncludeContext: string
{
    case None = 'none';
    case ThisServer = 'thisServer';
    case AllServers = 'allServers';
}
