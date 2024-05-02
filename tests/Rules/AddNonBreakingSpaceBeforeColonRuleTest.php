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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeColonRule;
use Generator;

class AddNonBreakingSpaceBeforeColonRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeColonRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Concept, création et réalisation technique : Bit&Black',
            'Concept, création et réalisation technique' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ': Bit&Black',
            '...on technique : Bit&Black...',
        ];

        yield [
            'Concept, création et réalisation technique: Bit&Black',
            'Concept, création et réalisation technique' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ': Bit&Black',
            '...on technique: Bit&Black...',
        ];

        yield [
            'Le score est de 2:3.',
            'Le score est de 2:3.',
            null,
        ];
    }
}
