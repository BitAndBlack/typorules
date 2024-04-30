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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterProfessorRule;
use Generator;

class AddNonBreakingSpaceAfterProfessorRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceAfterProfessorRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Hier kommt Prof. Tobias Köngeter',
            'Hier kommt Prof.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Tobias Köngeter',
            'Hier kommt Prof. Tobias Könge...',
        ];
    }
}
