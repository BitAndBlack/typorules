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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenWordNummerAndNumberRule;
use Generator;

final class AddNonBreakingSpaceBetweenWordNumberAndNumberRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenWordNummerAndNumberRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Das ist Nr. 8.',
            'Das ist Nr.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'Das ist Nr. 8.',
        ];

        yield [
            'Das ist Nummer 8.',
            'Das ist Nummer' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            '...s ist Nummer 8.',
        ];
    }
}
