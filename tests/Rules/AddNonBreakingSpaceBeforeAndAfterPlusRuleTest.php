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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeAndAfterPlusRule;
use Generator;

final class AddNonBreakingSpaceBeforeAndAfterPlusRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBeforeAndAfterPlusRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Willkommen bei Tobias + Deborah',
            'Willkommen bei Tobias' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '+' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . 'Deborah',
            '...lkommen bei Tobias + Deborah',
        ];

        yield [
            'Willkommen bei Tobias+Deborah',
            'Willkommen bei Tobias' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '+' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . 'Deborah',
            null,
        ];

        yield [
            '2 + 2',
            '2' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '+' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '2',
            '2 + 2',
        ];

        yield [
            '2+2',
            '2+2',
            null,
        ];
    }
}
