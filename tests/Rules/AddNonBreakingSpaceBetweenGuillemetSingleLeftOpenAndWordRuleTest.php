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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule;
use Generator;

class AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui › ».',
            'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'oui › ».',
            '...m\'as dit ‹ oui › »....',
        ];

        yield [
            'Je t\'ai dit «non», car «tout à l\'heure, tu m\'as dit ‹oui›».',
            'Je t\'ai dit «non», car «tout à l\'heure, tu m\'as dit ‹' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'oui›».',
            '...m\'as dit ‹oui›»....',
        ];
    }
}
