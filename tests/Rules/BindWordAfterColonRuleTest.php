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
use BitAndBlack\TypoRules\Rule\BindWordAfterColonRule;
use Generator;

class BindWordAfterColonRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return BindWordAfterColonRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ich bin der, der den Satz schreibt.',
            'Ich bin der, der' . CharactersEnum::NON_BREAKING_SPACE->value . 'den Satz schreibt.',
            'Ich bin der, der den Satz schr...',
        ];

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
    }
}
