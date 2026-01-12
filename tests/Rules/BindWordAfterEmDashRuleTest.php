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
use BitAndBlack\TypoRules\Rule\BindWordAfterEmDashRule;
use Generator;

/**
 * @deprecated
 * @todo Remove in v1.0.
 */
final class BindWordAfterEmDashRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return BindWordAfterEmDashRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Already over — not at all!',
            'Already over — not' . CharactersEnum::NON_BREAKING_SPACE->value . 'at all!',
            '...dy over — not at all!',
        ];

        yield [
            'Already over — don\'t think so!',
            'Already over — don\'t think so!',
            null,
        ];

        yield [
            'Already over — a mystery!',
            'Already over — a mystery!',
            null,
        ];
    }
}
