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

use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeQuestionMarkRule;
use Generator;

final class RemoveSpaceBeforeQuestionMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveSpaceBeforeQuestionMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Glaubst du ?',
            'Glaubst du?',
            'Glaubst du ?',
        ];

        yield [
            'Glaubst du?',
            'Glaubst du?',
            null,
        ];
    }
}
