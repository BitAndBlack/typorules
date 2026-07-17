<?php

declare(strict_types=1);

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

final class AddSpaceBetweenBracketsRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSpaceBetweenBracketsRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'a) Es geht los (warum auch immer)! Was(es)wir es?',
            'a' . CharactersEnum::HAIR_SPACE_UTF8->value . ') Es geht los (' . CharactersEnum::HAIR_SPACE_UTF8->value . 'warum auch immer' . CharactersEnum::HAIR_SPACE_UTF8->value . ')! Was(' . CharactersEnum::HAIR_SPACE_UTF8->value . 'es' . CharactersEnum::HAIR_SPACE_UTF8->value . ')wir es?',
            'a) Es geht los (warum au...',
        ];

        yield [
            '(Einfach nein.)',
            '(' . CharactersEnum::HAIR_SPACE_UTF8->value . 'Einfach nein.)',
            '(Einfach nein.)',
        ];

        yield [
            '(Einfach nein,) vermutlich',
            '(' . CharactersEnum::HAIR_SPACE_UTF8->value . 'Einfach nein,) vermutlich',
            '(Einfach nein,) vermutli...',
        ];
    }
}
