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
use BitAndBlack\TypoRules\Rule\ConvertCharactersToTrademarkCharRule;
use Generator;

class ConvertCharactersToTrademarkCharRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertCharactersToTrademarkCharRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Star Wars(tm)',
            'Star Wars' . CharactersEnum::TRADEMARK->value,
            'Star Wars(tm)',
        ];

        yield [
            'Star Wars(TM)',
            'Star Wars' . CharactersEnum::TRADEMARK->value,
            'Star Wars(TM)',
        ];

        yield [
            'Star Wars(Tm)',
            'Star Wars' . CharactersEnum::TRADEMARK->value,
            'Star Wars(Tm)',
        ];
    }
}
