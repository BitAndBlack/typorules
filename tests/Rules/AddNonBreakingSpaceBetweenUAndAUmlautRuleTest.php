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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenUAndAUmlautRule;
use Generator;

final class AddNonBreakingSpaceBetweenUAndAUmlautRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenUAndAUmlautRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'u. Ä.',
            'u.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'Ä.',
            'u. Ä.',
        ];

        yield [
            'Schau zu. Ä. war es nicht',
            'Schau zu. Ä. war es nicht',
            null,
        ];
    }
}
