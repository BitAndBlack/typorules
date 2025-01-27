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

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterQuestionMarkRule;
use Generator;

class AddNonBreakingSpaceBehindWordAfterQuestionMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBehindWordAfterQuestionMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Sicher? Ich denke nicht.',
            'Sicher? Ich' . CharactersEnum::NON_BREAKING_SPACE->value . 'denke nicht.',
            'Sicher? Ich denke nicht.',
        ];

        yield [
            'Sicher? Keinesfalls.',
            'Sicher? Keinesfalls.',
            null,
        ];

        yield [
            'Sicher? Ein Schlüsselelement!',
            'Sicher? Ein Schlüsselelement!',
            null,
        ];
    }
}
