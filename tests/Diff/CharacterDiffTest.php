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

namespace BitAndBlack\TypoRules\Tests\Diff;

use BitAndBlack\TypoRules\Diff\CharacterDiff;
use BitAndBlack\TypoRules\Diff\Output\HtmlOutput;
use PHPUnit\Framework\TestCase;

final class CharacterDiffTest extends TestCase
{
    public function testDiffComparesCharactersInsteadOfBytes(): void
    {
        $diff = CharacterDiff::create(new HtmlOutput());

        $result = $diff->getDiff('é', 'è');

        self::assertSame(
            '<del>é</del><ins>è</ins>',
            $result
        );

        self::assertTrue(
            mb_check_encoding($result, 'UTF-8'),
            'The diff output must be valid UTF-8.'
        );
    }

    public function testDiffOfAsciiCharacters(): void
    {
        $diff = CharacterDiff::create(new HtmlOutput());

        self::assertSame(
            'c<del>a</del><ins>o</ins>t',
            $diff->getDiff('cat', 'cot')
        );
    }
}
