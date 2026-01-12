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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNAndChrRule;
use Generator;

final class AddNonBreakingSpaceBetweenNAndChrRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenNAndChrRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            '25 n. Chr.',
            '25 n.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Chr.',
            '25 n. Chr.',
        ];
    }
}
