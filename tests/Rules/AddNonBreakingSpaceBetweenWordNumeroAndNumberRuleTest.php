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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenWordNumeroAndNumberRule;
use Generator;

final class AddNonBreakingSpaceBetweenWordNumeroAndNumberRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenWordNumeroAndNumberRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'C\'est le n° 8.',
            'C\'est le n°' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'C\'est le n° 8.',
        ];

        yield [
            'N° 8.',
            'N°' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'N° 8.',
        ];

        yield [
            'C\'est le numéro 8.',
            'C\'est le numéro' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            '...t le numéro 8.',
        ];

        yield [
            'Numéro 8.',
            'Numéro' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'Numéro 8.',
        ];

        yield [
            'C\'est le n°8.',
            'C\'est le n°' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'C\'est le n°8.',
        ];
    }
}
