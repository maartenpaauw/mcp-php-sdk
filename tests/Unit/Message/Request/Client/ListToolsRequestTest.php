<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\ListToolsRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: ListToolsRequest::class)]
#[CoversClass(className: PaginatedRequest::class)]
final class ListToolsRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $cursor = new Cursor(value: 'optional-cursor-value');
        $listPromptsRequest = new ListToolsRequest(cursor: $cursor);

        self::assertNull(actual: new ListToolsRequest()->getCursor());
        self::assertEquals(expected: $cursor, actual: $listPromptsRequest->getCursor());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new ListToolsRequest(),
                [],
            ],
            [
                new ListToolsRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                [
                    'cursor' => 'optional-cursor-value',
                ],
            ],
        ];
    }

    #[Override]
    public static function requestMethodDataProvider(): array
    {
        return [
            [
                new ListToolsRequest(),
                Method::ListTools,
            ],
            [
                new ListToolsRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                Method::ListTools,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new ListToolsRequest(),
                [],
            ],
            [
                new ListToolsRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                [
                    'cursor' => new Cursor(value: 'optional-cursor-value'),
                ],
            ],
        ];
    }
}
