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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenZAndBRule;
use Generator;

final class AddNonBreakingSpaceBetweenZAndBRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenZAndBRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'z. B.',
            'z.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'B.',
            'z. B.',
        ];

        yield [
            'Das war zu kurz. B. sah sich um.',
            'Das war zu kurz. B. sah sich um.',
            null,
        ];
    }
}
