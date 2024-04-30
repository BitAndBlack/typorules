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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterDoctorRule;
use Generator;

class AddNonBreakingSpaceAfterDoctorRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceAfterDoctorRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Hier kommt Dr. Tobias Köngeter',
            'Hier kommt Dr.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Tobias Köngeter',
            'Hier kommt Dr. Tobias Könge...',
        ];
    }
}
