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
use BitAndBlack\TypoRules\Rule\BindNumberToNumberRule;
use Generator;

/**
 * @deprecated
 * @todo Remove in v1.0.
 */
final class BindNumberToNumberRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return BindNumberToNumberRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Das ist Nr. 8.',
            'Das ist Nr.' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '8.',
            'Das ist Nr. 8.',
        ];
    }
}
