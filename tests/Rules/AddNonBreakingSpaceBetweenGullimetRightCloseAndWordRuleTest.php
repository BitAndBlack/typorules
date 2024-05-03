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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGullimetRightCloseAndWordRule;
use Generator;

class AddNonBreakingSpaceBetweenGullimetRightCloseAndWordRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenGullimetRightCloseAndWordRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'J\'ai dit « non » à toi.',
            'J\'ai dit « non' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '» à toi.',
            '...i dit « non » à toi....',
        ];

        yield [
            'J\'ai dit «non» à toi.',
            'J\'ai dit «non' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '» à toi.',
            '...ai dit «non» à toi.',
        ];
    }
}
