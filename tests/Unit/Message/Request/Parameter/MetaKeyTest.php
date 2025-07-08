<?php

declare(strict_types=1);

namespace Maartenpaauw\Mcp\Tests\Unit\Message\Request\Parameter;

use InvalidArgumentException;
use Maartenpaauw\Mcp\Message\Request\Parameter\Meta\Key;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(className: Key::class)]
final class MetaKeyTest extends TestCase
{
    #[Test]
    #[DataProvider('validKeyDataProvider')]
    public function it_can_only_construct_with_valid_key(string $key): void
    {
        $metaEntry = new Key(value: $key);

        self::assertSame(expected: $key, actual: (string) $metaEntry);
    }

    public static function validKeyDataProvider(): array
    {
        return [
            ['key'], // simple alphanumeric name
            ['my-key'], // name with hyphen
            ['my_key'], // name with underscore
            ['my.key'], // name with dot
            ['key123'], // name ending with a number
            ['123key'], // name starting with number
            ['a'], // single character name
            ['a1'], // two character names
            ['hybride.place/key'], // basic prefix with name
            ['hybride.place/my-key'], // prefix with hyphenated name
            ['hybride.place/my_key'], // prefix with underscored name
            ['hybride.place/my.key.name'], // prefix with dotted name
            ['hybride.place/key-123'], // prefix with mixed name
            ['hybride.place/a'], // prefix with a single char name
            ['api.hybride.place/key'], // multi-level prefix
            ['tools.api.hybride.place/key'], // deep prefix
            ['v1.api.hybride.place/endpoint'], // versioned API prefix
            ['staging.hybride.place/debug-info'], // environment prefix
            ['a/b'], // minimal valid key
            ['a1/b2'], // minimal with numbers
            ['api-v1.hybride.place/user-data'], // complex valid key
        ];
    }

    #[Test]
    #[DataProvider('invalidKeyDataProvider')]
    public function it_throws_an_invalid_argument_exception_when_invalid_key_is_given(string $key): void
    {
        self::expectException(exception: InvalidArgumentException::class);
        self::expectExceptionMessage(message: "The given key [$key] is not a valid meta-key");

        new Key(value: $key);
    }

    public static function invalidKeyDataProvider(): array
    {
        return [
            ['1hybride.place/key'], // prefix label starts with digit
            ['hybride.1place/key'], // prefix label starts with digit
            ['hybride-.place/key'], // prefix label ends with hyphen
            ['hybride.place-/key'], // prefix label ends with hyphen
            ['hybride.-place/key'], // prefix label starts with hyphen
            ['-hybride.place/key'], // prefix label starts with hyphen
            ['hybride..place/key'], // double dots in the prefix
            ['api.hybride..place/key'], // double dots in the prefix
            ['hybride.place./key'], // prefix ends with a dot before slash
            ['.hybride.place/key'], // prefix starts with a dot
            ['hybride.place/key/extra'], // multiple slashes
            ['hybride.place//key'], // double slash
            ['hybride.place/-key'], // name starts with hyphen
            ['hybride.place/_key'], // name starts with underscore
            ['hybride.place/.key'], // name starts with a dot
            ['hybride.place/key-'], // name ends with hyphen
            ['hybride.place/key_'], // name ends with underscore
            ['hybride.place/key.'], // the name ends with a dot
            ['hybride.place/'], // empty name after prefix
            ['api.hybride.place/'], // empty name after prefix
            ['tools.hybride.place/'], // empty name after prefix
            [''], // empty string
            [' '], // whitespace only
            ['  key  '], // leading/trailing spaces
            ["\t"], // tab character
            ["\n"], // newline character
            ['hybride.place/key@name'], // contains @ symbol
            ['hybride.place/key#name'], // contains # symbol
            ['hybride.place/key$name'], // contains $ symbol
            ['hybride.place/key%name'], // contains % symbol
            ['hybride.place/key+name'], // contains + symbol
            ['hybride.place/key=name'], // contains = symbol
            ['hybride.place/key name'], // contains space
            ['hybride.place/key*name'], // contains asterisk
            ['hybride.place/key&name'], // contains ampersand
            ['hybride@place/key'], // contains @ in prefix
            ['hybride place/key'], // contains space in the prefix
            ['hybride+place/key'], // contains + in prefix
            ['-'], // only hyphen
            ['_'], // only underscore
            ['.'], // only dot
            ['/'], // only slash
            ['--'], // only hyphens
            ['__'], // only underscores
            ['..'], // only dots
            ['123/key'], // prefix starts with numbers
            ['hybride.123/key'], // prefix label is only numbers
            ['hybride./key'], // empty label in prefix
            ['/key'], // prefix starts with slash
            ['hybride.place/123-'], // the name ends with hyphen after the number
            ['hybride.place/-123'], // name starts with hyphen before the number
            ['hybride-.place-/key'], // multiple prefix label issues
            ['hybride.place/kéy'], // contains accented character
            ['hybride.place/key🚀'], // contains emoji
            ['hybride.place/キー'], // contains non-Latin characters
        ];
    }
}
