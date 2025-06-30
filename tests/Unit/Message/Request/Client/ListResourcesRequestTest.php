<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\ListResourcesRequest;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: ListResourcesRequest::class)]
#[CoversClass(className: PaginatedRequest::class)]
final class ListResourcesRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $cursor = new Cursor(value: 'optional-cursor-value');
        $listPromptsRequest = new ListResourcesRequest(cursor: $cursor);

        self::assertNull(actual: new ListResourcesRequest()->cursor());
        self::assertEquals(expected: $cursor, actual: $listPromptsRequest->cursor());
    }
}
