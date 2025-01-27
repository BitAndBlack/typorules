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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterCommaRule;
use Generator;

class AddNonBreakingSpaceBehindWordAfterCommaRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBehindWordAfterCommaRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Glaube mir, es war so schön!',
            'Glaube mir, es' . CharactersEnum::NON_BREAKING_SPACE->value . 'war so schön!',
            'Glaube mir, es war so schön!',
        ];

        yield [
            'Glaube mir, alles war so schön!',
            'Glaube mir, alles war so schön!',
            null,
        ];

        yield [
            'Glaube mir, ein Schlüsselelement!',
            'Glaube mir, ein Schlüsselelement!',
            null,
        ];
    }
}
