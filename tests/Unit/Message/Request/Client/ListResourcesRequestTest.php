<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\ListResourcesRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
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

        self::assertNull(actual: new ListResourcesRequest()->getCursor());
        self::assertEquals(expected: $cursor, actual: $listPromptsRequest->getCursor());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new ListResourcesRequest(),
                [],
            ],
            [
                new ListResourcesRequest(
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
                new ListResourcesRequest(),
                Method::ListResources,
            ],
            [
                new ListResourcesRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                Method::ListResources,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new ListResourcesRequest(),
                [],
            ],
            [
                new ListResourcesRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                [
                    'cursor' => new Cursor(value: 'optional-cursor-value'),
                ],
            ],
        ];
    }
}
