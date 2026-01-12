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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule;
use Generator;

final class AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'J\'ai dit « non » à toi.',
            'J\'ai dit «' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'non » à toi.',
            'J\'ai dit « non » à toi...',
        ];

        yield [
            'J\'ai dit «non» à toi.',
            'J\'ai dit «' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'non» à toi.',
            'J\'ai dit «non» à toi.',
        ];
    }
}
