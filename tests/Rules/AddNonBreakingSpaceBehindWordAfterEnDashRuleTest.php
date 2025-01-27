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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterEnDashRule;
use Generator;

class AddNonBreakingSpaceBehindWordAfterEnDashRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBehindWordAfterEnDashRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Schon vorbei – von wegen!',
            'Schon vorbei – von' . CharactersEnum::NON_BREAKING_SPACE->value . 'wegen!',
            '... vorbei – von wegen!',
        ];

        yield [
            'Schon vorbei – noch nicht!',
            'Schon vorbei – noch nicht!',
            null,
        ];

        yield [
            'Schon vorbei – Ein Schlüsselelement.',
            'Schon vorbei – Ein Schlüsselelement.',
            null,
        ];
    }
}
