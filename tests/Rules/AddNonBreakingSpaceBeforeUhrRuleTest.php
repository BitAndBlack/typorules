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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeUhrRule;
use Generator;

class AddNonBreakingSpaceBeforeUhrRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeUhrRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Es ist 12.30 Uhr.',
            'Es ist 12.30' . CharactersEnum::NON_BREAKING_SPACE->value . 'Uhr.',
            'Es ist 12.30 Uhr.',
        ];

        yield [
            'Ich habe keine Uhr dabei',
            'Ich habe keine Uhr dabei',
            null,
        ];
    }
}
