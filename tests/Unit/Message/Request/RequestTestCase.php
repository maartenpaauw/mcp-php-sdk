<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request;

use Maartenpaauw\Mcp\Message\Request\Request;
use Maartenpaauw\Mcp\Tests\Unit\Message\MessageTestCase;
use PHPUnit\Framework\Attributes\CoversClassesThatImplementInterface;

#[CoversClassesThatImplementInterface(interfaceName: Request::class)]
abstract class RequestTestCase extends MessageTestCase {}
