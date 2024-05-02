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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeExclamationMarkRule;
use Generator;

class AddNonBreakingSpaceBeforeExclamationMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeExclamationMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'On y va !',
            'On y va' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '!',
            'On y va !',
        ];

        yield [
            'On y va!',
            'On y va' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '!',
            'On y va!',
        ];
    }
}
