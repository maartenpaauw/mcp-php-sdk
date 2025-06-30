<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message;

use Maartenpaauw\Mcp\Message\Message;
use PHPUnit\Framework\Attributes\CoversClassesThatImplementInterface;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClassesThatImplementInterface(interfaceName: Message::class)]
abstract class MessageTestCase extends TestCase {}
