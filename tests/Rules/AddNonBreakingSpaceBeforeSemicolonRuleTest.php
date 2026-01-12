<?php

declare(strict_types=1);

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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeSemicolonRule;
use Generator;

final class AddNonBreakingSpaceBeforeSemicolonRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeSemicolonRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Concept, création et réalisation technique ; Bit&Black',
            'Concept, création et réalisation technique' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '; Bit&Black',
            '...on technique ; Bit&Black...',
        ];

        yield [
            'Concept, création et réalisation technique; Bit&Black',
            'Concept, création et réalisation technique' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '; Bit&Black',
            '...on technique; Bit&Black...',
        ];
    }
}
