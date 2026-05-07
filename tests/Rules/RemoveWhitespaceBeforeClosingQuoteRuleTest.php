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

use BitAndBlack\TypoRules\Rule\RemoveWhitespaceBeforeClosingQuoteRule;
use Generator;

final class RemoveWhitespaceBeforeClosingQuoteRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveWhitespaceBeforeClosingQuoteRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Besonders "wichtige " Information',
            'Besonders "wichtige" Information',
            '...rs "wichtige " Information...',
        ];

        yield [
            'Besonders „wichtige “ Information',
            'Besonders „wichtige“ Information',
            '... „wichtige “ Information...',
        ];

        yield [
            'Besonders »wichtige « Information',
            'Besonders »wichtige« Information',
            '...s »wichtige « Information...',
        ];
    }
}
