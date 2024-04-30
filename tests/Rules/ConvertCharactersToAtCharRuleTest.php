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
use BitAndBlack\TypoRules\Rule\ConvertCharactersToAtCharRule;
use Generator;

class ConvertCharactersToAtCharRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertCharactersToAtCharRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'me(at)example.org',
            'me' . CharactersEnum::AT->value . 'example.org',
            'me(at)example.org',
        ];
    }
}
