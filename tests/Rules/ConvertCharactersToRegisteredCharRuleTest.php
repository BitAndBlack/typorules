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
use BitAndBlack\TypoRules\Rule\ConvertCharactersToRegisteredCharRule;
use Generator;

class ConvertCharactersToRegisteredCharRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertCharactersToRegisteredCharRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Apple(r)',
            'Apple' . CharactersEnum::REGISTERED->value,
            'Apple(r)',
        ];

        yield [
            'Apple(R)',
            'Apple' . CharactersEnum::REGISTERED->value,
            'Apple(R)',
        ];
    }
}
