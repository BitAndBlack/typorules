<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\RuleSet;

use BitAndBlack\TypoRules\RuleSet\EnglishRuleSet;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EnglishRuleSetTest extends TestCase
{
    public static function getCanHandleRulesData(): Generator
    {
        yield [
            'This is  an example sentence. From whom? From me. To you - I don\'t    know why!I\'m the one , who writes a sentence. No.1 is like the little 1x1!!! This library was created and tested and is used by and, and, and... (c) Bit&Black.',
            'This is an example sentence. From whom? From me. To you — I don\'t know why! I\'m the one, who writes a sentence. No. 1 is like the little 1 × 1!! This library was created and tested and is used by and, and, and… © Bit&Black.',
            13,
        ];
    }

    #[DataProvider('getCanHandleRulesData')]
    public function testCanHandleRules(string $content, string $contentFixedExpected, int $violationsCountExpected): void
    {
        $englishRuleSet = new EnglishRuleSet();
        $violations = $englishRuleSet->getViolations($content);

        self::assertCount(
            $violationsCountExpected,
            $violations
        );

        $contentFixed = $englishRuleSet->getContentFixed($content);

        self::assertSame(
            $contentFixedExpected,
            $contentFixed
        );
    }
}
