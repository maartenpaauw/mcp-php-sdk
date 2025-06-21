<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp;

enum StringSchemaFormat: string
{
    case Email = 'email';
    case Uri = 'uri';
    case Date = 'date';
    case DateTime = 'date-time';
}
