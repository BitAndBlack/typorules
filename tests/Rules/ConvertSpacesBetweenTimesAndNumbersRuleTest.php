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
use BitAndBlack\TypoRules\Rule\ConvertSpacesBetweenTimesAndNumbersRule;
use Generator;

class ConvertSpacesBetweenTimesAndNumbersRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertSpacesBetweenTimesAndNumbersRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Format: 15 × 9 cm.',
            'Format: 15' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '×' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '9 cm.',
            'Format: 15 × 9 cm.',
        ];

        yield [
            'Format: 15 x 9 cm.',
            'Format: 15' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'x' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '9 cm.',
            'Format: 15 x 9 cm.',
        ];
    }
}
