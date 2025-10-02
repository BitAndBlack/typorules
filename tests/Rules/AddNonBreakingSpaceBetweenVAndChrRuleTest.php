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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenVAndChrRule;
use Generator;

class AddNonBreakingSpaceBetweenVAndChrRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenVAndChrRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            '25 v. Chr.',
            '25 v.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Chr.',
            '25 v. Chr.',
        ];
    }
}
