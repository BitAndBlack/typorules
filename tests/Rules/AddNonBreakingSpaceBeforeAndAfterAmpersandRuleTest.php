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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeAndAfterAmpersandRule;
use Generator;

class AddNonBreakingSpaceBeforeAndAfterAmpersandRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeAndAfterAmpersandRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Willkommen bei Tobias & Deborah',
            'Willkommen bei Tobias' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '&' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Deborah',
            '...lkommen bei Tobias & Deborah',
        ];

        yield [
            'Willkommen bei Tobias&Deborah',
            'Willkommen bei Tobias' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '&' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Deborah',
            null,
        ];

        yield [
            '2 & 2',
            '2' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '&' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '2',
            '2 & 2',
        ];

        yield [
            '2&2',
            '2&2',
            null,
        ];
    }
}
