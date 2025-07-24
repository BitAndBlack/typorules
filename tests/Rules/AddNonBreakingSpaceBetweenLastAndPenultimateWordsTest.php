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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenLastAndPenultimateWords;
use Generator;

class AddNonBreakingSpaceBetweenLastAndPenultimateWordsTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenLastAndPenultimateWords::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield 'Umlaut and exclamation mark' => [
            'Glaube mir: es war so schön!',
            'Glaube mir: es war so' . CharactersEnum::NON_BREAKING_SPACE->value . 'schön!',
            '...r: es war so schön!...',
        ];

        yield 'Short word in range' => [
            'Nur ganz kurz.',
            'Nur ganz' . CharactersEnum::NON_BREAKING_SPACE->value . 'kurz.',
            'Nur ganz kurz.',
        ];

        yield 'Long word outside range' => [
            'Etwas länger',
            'Etwas länger',
            null,
        ];
    }
}
