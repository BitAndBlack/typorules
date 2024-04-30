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

use BitAndBlack\TypoRules\Rule\AddSpaceBehindQuestionMarkRule;
use Generator;

class AddSpaceBehindQuestionMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSpaceBehindQuestionMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ganz am Ende?Wie geht\'s weiter?',
            'Ganz am Ende? Wie geht\'s weiter?',
            'Ganz am Ende?Wie geht\'s w...',
        ];

        yield [
            'Ganz am Ende? Wie geht\'s weiter?',
            'Ganz am Ende? Wie geht\'s weiter?',
            null,
        ];

        yield [
            'Ganz am Ende???Wie geht\'s weiter?',
            'Ganz am Ende??? Wie geht\'s weiter?',
            '...nz am Ende???Wie geht\'s w...',
        ];
    }
}
