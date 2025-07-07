<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Parameter;

use InvalidArgumentException;
use JsonSerializable;
use Maartenpaauw\Mcp\Message\Request\Parameter\Unknown;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use stdClass;

#[CoversClass(className: Unknown::class)]
final class UnknownTest extends TestCase
{
    #[Test]
    #[DataProvider('validSerializableValuesDataProvider')]
    public function it_should_construct_json_serializable_values(mixed $value): void
    {
        $unknown = new Unknown(value: $value);

        self::assertSame(expected: $value, actual: $unknown->jsonSerialize());
    }

    /**
     * @return array<array-key, array{
     *     0: mixed,
     * }>
     */
    public static function validSerializableValuesDataProvider(): array
    {
        $stdClass = new stdClass();
        $stdClass->name = 'John';
        $stdClass->age = 30;

        $jsonSerializableObject = new class implements JsonSerializable {
            public function jsonSerialize(): array
            {
                return ['custom' => 'serialization'];
            }
        };

        return [
            'null' => [null],
            'boolean true' => [true],
            'boolean false' => [false],
            'integer zero' => [0],
            'integer positive' => [42],
            'integer negative' => [-17],
            'float zero' => [0.0],
            'float positive' => [3.14],
            'float negative' => [-2.71],
            'empty string' => [''],
            'simple string' => ['Hello World'],
            'string with Unicode' => ['🚀 PHP'],
            'string with quotes' => ['He said "Hello"'],
            'empty array' => [[]],
            'indexed array' => [[1, 2, 3]],
            'associative array' => [['name' => 'John', 'age' => 30]],
            'nested array' => [['users' => [['id' => 1], ['id' => 2]]]],
            'mixed array' => [['string', 42, true, null]],
            'stdClass object' => [$stdClass],
            'JsonSerializable object' => [$jsonSerializableObject],
            'array with objects' => [[$stdClass, $jsonSerializableObject]],
        ];
    }

    #[Test]
    #[DataProvider('invalidSerializableValuesDataProvider')]
    public function it_should_throw_invalid_argument_exception_for_non_serializable_values(mixed $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Provided value is not JSON serializable');

        new Unknown(value: $value);
    }

    /**
     * @return array<array-key, array{
     *     0: mixed,
     * }>
     */
    public static function invalidSerializableValuesDataProvider(): array
    {
        $resource = fopen(filename: 'php://memory', mode: 'r');

        $circularA = ['name' => 'A'];
        $circularB = ['name' => 'B', 'ref' => &$circularA];
        $circularA['ref'] = &$circularB;

        $objA = new stdClass();
        $objB = new stdClass();
        $objA->ref = $objB;
        $objB->ref = $objA;

        $arrayWithResource = ['valid' => true, 'resource' => $resource];

        $objectWithResource = new class {
            public $resource;

            public function __construct()
            {
                $this->resource = fopen(filename: 'php://memory', mode: 'r');
            }
        };

        return [
            'resource' => [$resource],
            'circular reference array' => [$circularA],
            'circular reference object' => [$objA],
            'array containing resource' => [$arrayWithResource],
            'object with resource property' => [$objectWithResource],
        ];
    }
}
