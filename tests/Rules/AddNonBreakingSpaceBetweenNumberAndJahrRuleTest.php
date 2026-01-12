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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndJahrRule;
use Generator;

final class AddNonBreakingSpaceBetweenNumberAndJahrRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenNumberAndJahrRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Vor 30 Jahren',
            'Vor 30' . CharactersEnum::NON_BREAKING_SPACE->value . 'Jahren',
            'Vor 30 Jahren',
        ];
    }
}
