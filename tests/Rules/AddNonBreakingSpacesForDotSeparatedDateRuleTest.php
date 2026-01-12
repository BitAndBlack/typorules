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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpacesForDotSeparatedDateRule;
use Generator;

final class AddNonBreakingSpacesForDotSeparatedDateRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpacesForDotSeparatedDateRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Einladung zur Feier am Freitag, dem 01.03.2025.',
            'Einladung zur Feier am Freitag, dem 01.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '03.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '2025.',
            '...reitag, dem 01.03.2025....',
        ];

        yield [
            'Einladung zur Feier am Freitag, dem 01. 03. 2025.',
            'Einladung zur Feier am Freitag, dem 01.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '03.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '2025.',
            '...reitag, dem 01. 03. 2025....',
        ];
    }
}
