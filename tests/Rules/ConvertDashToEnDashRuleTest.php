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

use BitAndBlack\TypoRules\Rule\ConvertDashToEnDashRule;
use Generator;

final class ConvertDashToEnDashRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertDashToEnDashRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Und wenn schon - ich glaube nicht!',
            'Und wenn schon – ich glaube nicht!',
            '...d wenn schon - ich glaube n...',
        ];

        yield [
            'Und wenn schon – ich glaube nicht!',
            'Und wenn schon – ich glaube nicht!',
            null,
        ];
    }
}
