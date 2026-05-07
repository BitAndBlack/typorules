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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenUAndVAndMRule;
use Generator;

final class AddNonBreakingSpaceBetweenUAndVAndMRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenUAndVAndMRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'u. v. m.',
            'u.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'v.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'm.',
            'u. v. m.',
        ];

        yield [
            'u.v.m.',
            'u.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'v.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'm.',
            'u.v.m.',
        ];
    }
}
