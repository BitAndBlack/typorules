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
use BitAndBlack\TypoRules\Rule\BindWordAfterDotRule;
use Generator;

class BindWordAfterDotRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return BindWordAfterDotRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Schon vorbei. Von wegen!',
            'Schon vorbei. Von' . CharactersEnum::NON_BREAKING_SPACE->value . 'wegen!',
            'Schon vorbei. Von wegen!',
        ];

        yield [
            'Schon vorbei. Noch nicht!',
            'Schon vorbei. Noch nicht!',
            null,
        ];
    }
}
