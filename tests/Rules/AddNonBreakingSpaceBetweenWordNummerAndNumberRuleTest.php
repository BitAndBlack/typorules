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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenWordNumberAndNumberRule;
use Generator;

class AddNonBreakingSpaceBetweenWordNummerAndNumberRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenWordNumberAndNumberRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'This is no. 8.',
            'This is no.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'This is no. 8.',
        ];

        yield [
            'This is number 8.',
            'This is number' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            '...is is number 8.',
        ];

        yield [
            '№ 8.',
            '№' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            '№ 8.',
        ];
    }
}
