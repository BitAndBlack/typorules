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
use BitAndBlack\TypoRules\Rule\AddSpaceBetweenBracketsRule;
use Generator;

class AddSpaceBetweenBracketsRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSpaceBetweenBracketsRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'a) Es geht los (warum auch immer)! Was(es)wir es?',
            'a' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ') Es geht los (' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'warum auch immer' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ')! Was(' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'es' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . ')wir es?',
            'a) Es geht los (warum au...',
        ];
    }
}
