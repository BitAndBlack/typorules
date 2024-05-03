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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule;
use Generator;

class AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui › ».',
            'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '› ».',
            '... dit ‹ oui › »....',
        ];

        yield [
            'Je t\'ai dit «non», car «tout à l\'heure, tu m\'as dit ‹oui›».',
            'Je t\'ai dit «non», car «tout à l\'heure, tu m\'as dit ‹oui' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '›».',
            '...s dit ‹oui›»....',
        ];
    }
}
