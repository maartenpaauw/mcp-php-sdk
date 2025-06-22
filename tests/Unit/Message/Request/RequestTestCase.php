<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request;

use Maartenpaauw\Mcp\Message\Request\BaseRequest;
use Maartenpaauw\Mcp\Message\Request\Method;
use Maartenpaauw\Mcp\Message\Request\Request;
use Maartenpaauw\Mcp\Tests\Unit\Message\MessageTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversClassesThatImplementInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(className: BaseRequest::class)]
#[CoversClassesThatImplementInterface(interfaceName: Request::class)]
abstract class RequestTestCase extends MessageTestCase
{
    /**
     * @return array<array-key, array{
     *     0: Request,
     *     1: Method
     * }>
     */
    abstract public static function requestMethodDataProvider(): array;

    /**
     * @return array<array-key, array{
     *     0: Request,
     *     1: array,
     * }>
     */
    abstract public static function requestParametersDataProvider(): array;

    #[Test]
    #[DataProvider('requestMethodDataProvider')]
    public function it_has_the_expected_method(Request $request, Method $expectedMethod): void
    {
        self::assertEquals(expected: $expectedMethod, actual: $request->method());
    }

    #[Test]
    #[DataProvider('requestParametersDataProvider')]
    public function it_has_the_expected_parameters(Request $request, array $parameters): void
    {
        self::assertEquals(expected: $parameters, actual: $request->parameters());
    }
}
