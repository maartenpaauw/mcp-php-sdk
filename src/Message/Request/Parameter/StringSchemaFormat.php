<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Message\Request\Parameter;

enum StringSchemaFormat: string
{
    case Email = 'email';
    case Uri = 'uri';
    case Date = 'date';
    case DateTime = 'date-time';
}
