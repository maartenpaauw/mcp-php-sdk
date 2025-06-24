<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Client;

use Maartenpaauw\Mcp\Message\Request\Client\ListResourceTemplatesRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\PaginatedRequest;
use Maartenpaauw\Mcp\Message\Request\Parameter\Cursor;
use Maartenpaauw\Mcp\Tests\Unit\Message\Request\RequestTestCase;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: ListResourceTemplatesRequest::class)]
#[CoversClass(className: PaginatedRequest::class)]
final class ListResourceTemplatesRequestTest extends RequestTestCase
{
    #[Test]
    public function it_should_be_possible_to_receive_the_given_parameters(): void
    {
        $cursor = new Cursor(value: 'optional-cursor-value');
        $listPromptsRequest = new ListResourceTemplatesRequest(cursor: $cursor);

        self::assertNull(actual: new ListResourceTemplatesRequest()->getCursor());
        self::assertEquals(expected: $cursor, actual: $listPromptsRequest->getCursor());
    }

    #[Override]
    public static function serializedMessageDataProvider(): array
    {
        return [
            [
                new ListResourceTemplatesRequest(),
                [],
            ],
            [
                new ListResourceTemplatesRequest(
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
                new ListResourceTemplatesRequest(),
                Method::ListResourceTemplates,
            ],
            [
                new ListResourceTemplatesRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                Method::ListResourceTemplates,
            ],
        ];
    }

    #[Override]
    public static function requestParametersDataProvider(): array
    {
        return [
            [
                new ListResourceTemplatesRequest(),
                [],
            ],
            [
                new ListResourceTemplatesRequest(
                    cursor: new Cursor(value: 'optional-cursor-value'),
                ),
                [
                    'cursor' => new Cursor(value: 'optional-cursor-value'),
                ],
            ],
        ];
    }
}
