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
use BitAndBlack\TypoRules\Rule\BindWordAfterExclamationMarkRule;
use Generator;

/**
 * @deprecated
 * @todo Remove in v1.0.
 */
final class BindWordAfterExclamationMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return BindWordAfterExclamationMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Sicher! Ich denke nicht.',
            'Sicher! Ich' . CharactersEnum::NON_BREAKING_SPACE->value . 'denke nicht.',
            'Sicher! Ich denke nicht.',
        ];

        yield [
            'Sicher! Keinesfalls.',
            'Sicher! Keinesfalls.',
            null,
        ];

        yield [
            'Sicher! Ein Schlüsselelement!',
            'Sicher! Ein Schlüsselelement!',
            null,
        ];
    }
}
