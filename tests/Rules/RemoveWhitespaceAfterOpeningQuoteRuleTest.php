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

use BitAndBlack\TypoRules\Rule\RemoveWhitespaceAfterOpeningQuoteRule;
use Generator;

final class RemoveWhitespaceAfterOpeningQuoteRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveWhitespaceAfterOpeningQuoteRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Besonders " wichtige " Information',
            'Besonders "wichtige " Information',
            'Besonders " wichtige " Information',
        ];

        yield [
            'Besonders „ wichtige “ Information',
            'Besonders „wichtige “ Information',
            '...esonders „ wichtige “ Information...',
        ];

        yield [
            'Besonders » wichtige « Information',
            'Besonders »wichtige « Information',
            'Besonders » wichtige « Information',
        ];
    }
}
