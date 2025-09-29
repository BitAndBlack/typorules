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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGebAndYearRule;
use Generator;

class AddNonBreakingSpaceBetweenGebAndYearRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenGebAndYearRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Tobias Mayer (geb. 1723)',
            'Tobias Mayer (geb.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '1723)',
            '... Mayer (geb. 1723)',
        ];
    }
}
