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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndJhRule;
use Generator;

class AddNonBreakingSpaceBetweenNumberAndJhRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenNumberAndJhRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Im 18. Jh.',
            'Im 18.' . CharactersEnum::NON_BREAKING_SPACE->value . 'Jh.',
            'Im 18. Jh.',
        ];
    }
}
