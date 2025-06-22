<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request;

use Maartenpaauw\Mcp\Message\Request\ParameterFilter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Small]
#[CoversClass(className: ParameterFilter::class)]
final class ParameterFilterTest extends TestCase
{
    #[Test]
    public function test_it_should_return_false_when_given_parameter_is_an_empty_array_or_null(): void
    {
        $parameterFilter = new ParameterFilter();

        self::assertFalse(condition: $parameterFilter(parameter: null));
        self::assertFalse(condition: $parameterFilter(parameter: []));
    }
}
