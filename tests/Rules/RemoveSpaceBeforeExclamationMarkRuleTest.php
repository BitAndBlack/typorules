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

use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeExclamationMarkRule;
use Generator;

class RemoveSpaceBeforeExclamationMarkRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveSpaceBeforeExclamationMarkRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ich glaube nicht !',
            'Ich glaube nicht!',
            '...glaube nicht !',
        ];

        yield [
            'Ich glaube nicht!',
            'Ich glaube nicht!',
            null,
        ];
    }
}
