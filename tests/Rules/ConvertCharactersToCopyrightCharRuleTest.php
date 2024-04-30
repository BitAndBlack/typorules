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
use BitAndBlack\TypoRules\Rule\ConvertCharactersToCopyrightCharRule;
use Generator;

class ConvertCharactersToCopyrightCharRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertCharactersToCopyrightCharRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            '(c) Bit&Black',
            CharactersEnum::COPY->value . ' Bit&Black',
            '(c) Bit&Black',
        ];

        yield [
            '(c) Bit&Black',
            CharactersEnum::COPY->value . ' Bit&Black',
            '(c) Bit&Black',
        ];

        yield [
            '( c ) Bit&Black',
            CharactersEnum::COPY->value . ' Bit&Black',
            '( c ) Bit&Black',
        ];

        yield [
            '(' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'c' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ') Bit&Black',
            CharactersEnum::COPY->value . ' Bit&Black',
            '(' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'c' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ') Bit&Black',
        ];
    }
}
