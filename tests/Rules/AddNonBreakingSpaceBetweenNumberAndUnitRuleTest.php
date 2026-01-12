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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule;
use Generator;

final class AddNonBreakingSpaceBetweenNumberAndUnitRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenNumberAndUnitRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            '1 km, 200 ° C, 1,2 Minuten',
            '1 km, 200' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '° C, 1,2 Minuten',
            '1 km, 200 ° C, 1,2 Minuten',
        ];

        yield [
            'Es wurde um 1560 erbaut.',
            'Es wurde um 1560 erbaut.',
            null,
        ];
    }
}
