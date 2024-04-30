<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\Rules;

use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use Generator;

class RemoveDuplicatedWhitespaceRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveDuplicatedWhitespaceRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ganz am      Ende.  Wie geht\'s weiter?',
            'Ganz am Ende. Wie geht\'s weiter?',
            'Ganz am      Ende.  Wie geht\'s...',
        ];

        yield [
            'Ganz am Ende. Wie geht\'s weiter?',
            'Ganz am Ende. Wie geht\'s weiter?',
            null,
        ];
    }
}
