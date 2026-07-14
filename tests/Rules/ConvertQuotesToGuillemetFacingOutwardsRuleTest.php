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

use BitAndBlack\TypoRules\Rule\ConvertQuotesToGuillemetFacingOutwardsRule;
use Generator;

final class ConvertQuotesToGuillemetFacingOutwardsRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertQuotesToGuillemetFacingOutwardsRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Information particulièrement "importante"',
            'Information particulièrement «importante»',
            '...ulièrement "importante"...',
        ];
    }
}
