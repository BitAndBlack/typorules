<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\Rules;

use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeCommaRule;
use Generator;

class RemoveSpaceBeforeCommaRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveSpaceBeforeCommaRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Wir glauben ,dass das Sinn macht.',
            'Wir glauben, dass das Sinn macht.',
            'Wir glauben ,dass das Sinn...',
        ];

        yield [
            'Wir glauben, dass das Sinn macht.',
            'Wir glauben, dass das Sinn macht.',
            null,
        ];
    }
}
