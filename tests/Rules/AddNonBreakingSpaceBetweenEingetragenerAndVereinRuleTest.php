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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenEingetragenerAndVereinRule;
use Generator;

final class AddNonBreakingSpaceBetweenEingetragenerAndVereinRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenEingetragenerAndVereinRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Supersport 500 e.V.',
            'Supersport 500 e.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'V.',
            '...sport 500 e.V.',
        ];

        yield [
            'Supersport 500 e. V.',
            'Supersport 500 e.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'V.',
            '...sport 500 e. V.',
        ];
    }
}
