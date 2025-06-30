<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

enum Role: string
{
    case User = 'user';
    case Assistant = 'assistant';
}
