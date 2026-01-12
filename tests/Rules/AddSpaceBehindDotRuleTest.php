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
use BitAndBlack\TypoRules\Rule\AddSpaceBehindDotRule;
use Generator;

final class AddSpaceBehindDotRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSpaceBehindDotRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ganz am Ende.Wie geht\'s weiter.',
            'Ganz am Ende. Wie geht\'s weiter.',
            'Ganz am Ende.Wie geht\'s w...',
        ];

        yield [
            'Ganz am Ende. Wie geht\'s weiter.',
            'Ganz am Ende. Wie geht\'s weiter.',
            null,
        ];

        yield [
            '5.0 liters',
            '5.0 liters',
            null,
        ];

        yield [
            'Supersport 500 e.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'V.',
            'Supersport 500 e.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . 'V.',
            null,
        ];
    }
}
