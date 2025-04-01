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

use BitAndBlack\TypoRules\RuleSet\GermanRuleSet;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GermanRuleSetTest extends TestCase
{
    public static function getCanHandleRulesData(): Generator
    {
        yield [
            'Dies ist  ein Beispielsatz.Von wem? Von mir. An dich - Keine   Ahnung warum!Ich bin der , der einen Satz schreibt. Nr.1 ist wie das kleine 1x1!!! Diese Bibliothek wurde erstellt und getestet und wird verwendet von und, und, und... (c) Bit&Black.',
            'Dies ist ein Beispielsatz. Von wem? Von mir. An dich – Keine Ahnung warum! Ich bin der, der einen Satz schreibt. Nr. 1 ist wie das kleine 1 × 1!! Diese Bibliothek wurde erstellt und getestet und wird verwendet von und, und, und… © Bit&Black.',
            14,
        ];
    }

    #[DataProvider('getCanHandleRulesData')]
    public function testCanHandleRules(string $content, string $contentFixedExpected, int $violationsCountExpected): void
    {
        $germanRuleSet = new GermanRuleSet();
        $violations = $germanRuleSet->getViolations($content);

        self::assertCount(
            $violationsCountExpected,
            $violations
        );

        $contentFixed = $germanRuleSet->getContentFixed($content);

        self::assertSame(
            $contentFixedExpected,
            $contentFixed
        );
    }
}
