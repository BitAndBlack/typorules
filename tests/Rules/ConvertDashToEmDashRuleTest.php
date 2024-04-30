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

use BitAndBlack\TypoRules\Rule\ConvertDashToEmDashRule;
use Generator;

class ConvertDashToEmDashRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertDashToEmDashRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'And if so - I don\'t think so!',
            'And if so — I don\'t think so!',
            'And if so - I don\'t think s...',
        ];

        yield [
            'And if so — I don\'t think so!',
            'And if so — I don\'t think so!',
            null,
        ];
    }
}
