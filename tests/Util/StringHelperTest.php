<?php

declare(strict_types=1);

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\Util;

use BitAndBlack\TypoRules\Util\StringHelper;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class StringHelperTest extends TestCase
{
    /**
     * @return Generator<(array<int, bool>|array<int, string>)>
     */
    public static function getDoesStringContainHtmlData(): Generator
    {
        yield [
            'Hello, World!',
            false,
        ];

        yield [
            'Price is $10 < $20',
            false,
        ];

        yield [
            '/** @var array<int|string, string> $foo */',
            false,
        ];

        yield [
            'Use generics: Map<string, List<int>>',
            false,
        ];

        yield [
            'a < b && c > d',
            false,
        ];

        yield [
            '<>',
            false,
        ];

        yield [
            '< div >',
            false,
        ];

        yield [
            '<123>',
            false,
        ];

        yield [
            '<_foo>',
            false,
        ];

        yield [
            '<-tag>',
            false,
        ];

        yield [
            '',
            false,
        ];

        yield [
            'Just text with a lonely <',
            false,
        ];

        yield [
            'Just text with a lonely >',
            false,
        ];

        yield [
            '<b>bold</b>',
            true,
        ];

        yield [
            '<p>paragraph</p>',
            true,
        ];

        yield [
            '<div>content</div>',
            true,
        ];

        yield [
            '<span>text</span>',
            true,
        ];

        yield [
            '<br>',
            true,
        ];

        yield [
            '<hr>',
            true,
        ];

        yield [
            '<h1>Title</h1>',
            true,
        ];

        yield [
            '<script>alert("xss")</script>',
            true,
        ];

        yield [
            '<br/>',
            true,
        ];

        yield [
            '<br />',
            true,
        ];

        yield [
            '<img src="photo.jpg" />',
            true,
        ];

        yield [
            '<input type="text" />',
            true,
        ];

        yield [
            '<a href="https://example.com">link</a>',
            true,
        ];

        yield [
            '<img src="photo.jpg" alt="Photo">',
            true,
        ];

        yield [
            '<div class="container" id="main">',
            true,
        ];

        yield [
            '<input type="text" name="q" placeholder="Search...">',
            true,
        ];

        yield [
            '</div>',
            true,
        ];

        yield [
            '</p>',
            true,
        ];

        yield [
            '</span>',
            true,
        ];

        yield [
            '<DIV>content</DIV>',
            true,
        ];

        yield [
            '<Div>content</Div>',
            true,
        ];

        yield [
            '<SCRIPT>alert("xss")</SCRIPT>',
            true,
        ];

        yield [
            'Hello <b>World</b>!',
            true,
        ];

        yield [
            'Visit <a href="https://example.com">here</a> for info.',
            true,
        ];

        yield [
            '/** @var string $foo */ <p>oops</p>',
            true,
        ];

        yield [
            'Price is $10 < $20 and this is <b>bold</b>',
            true,
        ];

        yield [
            '<a>',
            true,
        ];

        yield [
            '<z>',
            true,
        ];

        yield [
            '<p ',
            false,
        ];

        yield [
            '< p>',
            false,
        ];

        yield [
            '<p\n>',
            false,
        ];

        yield [
            "<p\t>",
            false,
        ];

        yield [
            '<<b>>',
            true,
        ];

        yield [
            '<b onclick="alert">',
            true,
        ];

        yield [
            '<br class="">',
            true,
        ];
    }

    #[DataProvider('getDoesStringContainHtmlData')]
    public function testDoesStringContainHtml(string $input, bool $doesStringContainHtmlExpected): void
    {
        self::assertSame(
            $doesStringContainHtmlExpected,
            StringHelper::doesStringContainHtml($input),
            'Input was "' . $input . '".'
        );
    }
}
