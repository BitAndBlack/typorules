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

use BitAndBlack\TypoRules\Rule\RemoveLeadingZerosFromDotSeparatedDateRule;
use Generator;

final class RemoveLeadingZerosFromDotSeparatedDateRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveLeadingZerosFromDotSeparatedDateRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Einladung zur Feier am Freitag, dem 01.03.2025.',
            'Einladung zur Feier am Freitag, dem 1.3.2025.',
            '...reitag, dem 01.03.2025....',
        ];

        yield [
            'Einladung zur Feier am Freitag, dem 01. 03. 2025.',
            'Einladung zur Feier am Freitag, dem 1. 3. 2025.',
            '...reitag, dem 01. 03. 2025....',
        ];

        yield [
            'Einladung zur Feier am Freitag, dem 11.12.2025.',
            'Einladung zur Feier am Freitag, dem 11.12.2025.',
            null,
        ];

        yield [
            'Einladung zur Feier am Freitag, dem 10. 10. 2025.',
            'Einladung zur Feier am Freitag, dem 10. 10. 2025.',
            null,
        ];
    }
}
