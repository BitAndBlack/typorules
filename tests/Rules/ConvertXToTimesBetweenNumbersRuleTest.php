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
use BitAndBlack\TypoRules\Rule\ConvertXToTimesBetweenNumbersRule;
use Generator;

final class ConvertXToTimesBetweenNumbersRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertXToTimesBetweenNumbersRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Format: 15 x 9 cm.',
            'Format: 15 ' . CharactersEnum::TIMES->value . ' 9 cm.',
            'Format: 15 x 9 cm.',
        ];
    }
}
