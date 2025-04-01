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

use BitAndBlack\TypoRules\RuleSet\FrenchRuleSet;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class FrenchRuleSetTest extends TestCase
{
    public static function getCanHandleRulesData(): Generator
    {
        yield [
            'Il s\'agit  d\'une phrase d\'exemple.Par qui? De ma part. À toi - je ne    sais pas pourquoi! C\'est moi , qui écris une phrase. Le n°1, c\'est comme le petit 1x1 ! Cette bibliothèque a été créée, testée et est utilisée par et, et, et... (c) Bit&Black.',
            'Il s\'agit d\'une phrase d\'exemple. Par qui ? De ma part. À toi – je ne sais pas pourquoi ! C\'est moi, qui écris une phrase. Le n° 1, c\'est comme le petit 1 × 1 ! Cette bibliothèque a été créée, testée et est utilisée par et, et, et… © Bit&Black.',
            15,
        ];
    }

    #[DataProvider('getCanHandleRulesData')]
    public function testCanHandleRules(string $content, string $contentFixedExpected, int $violationsCountExpected): void
    {
        $frenchRuleSet = new FrenchRuleSet();
        $violations = $frenchRuleSet->getViolations($content);

        self::assertCount(
            $violationsCountExpected,
            $violations
        );

        $contentFixed = $frenchRuleSet->getContentFixed($content);

        self::assertSame(
            $contentFixedExpected,
            $contentFixed
        );
    }
}
