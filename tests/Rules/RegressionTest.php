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

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeAndAfterAmpersandRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeAndAfterPlusRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeColonRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeSemicolonRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterDotRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGebAndYearRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenLastAndPenultimateWords;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenWordNummerAndNumberRule;
use BitAndBlack\TypoRules\Rule\AddSoftHyphenBetweenDashSeparatedWordsRule;
use BitAndBlack\TypoRules\Rule\AddSoftHyphenToWordRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBetweenBracketsRule;
use BitAndBlack\TypoRules\Rule\ConvertDashToEmDashRule;
use BitAndBlack\TypoRules\Rule\ConvertDashToEnDashRule;
use BitAndBlack\TypoRules\Rule\ConvertQuotesToDoubleBottomTopRule;
use BitAndBlack\TypoRules\Rule\ConvertSpacesBetweenTimesAndNumbersRule;
use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeCommaRule;
use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\RemoveWhitespaceAtBeginningRule;
use PHPUnit\Framework\TestCase;

/**
 * Covers rules that silently change or destroy content they must not touch.
 */
final class RegressionTest extends TestCase
{
    public function testRemoveWhitespaceAtBeginningKeepsTextWithoutLeadingWhitespace(): void
    {
        $rule = new RemoveWhitespaceAtBeginningRule();

        self::assertSame(
            'note taking',
            $rule->getContentFixed('note taking')
        );

        self::assertSame(
            '8 things remain',
            $rule->getContentFixed('8 things remain')
        );

        self::assertSame(
            '2024 report',
            $rule->getContentFixed('2024 report')
        );
    }

    public function testRemoveWhitespaceAtBeginningStillRemovesLeadingWhitespace(): void
    {
        $rule = new RemoveWhitespaceAtBeginningRule();

        self::assertSame(
            'hello',
            $rule->getContentFixed('  hello')
        );
    }

    public function testConvertSpacesBetweenTimesAndNumbersKeepsAllDigits(): void
    {
        $rule = new ConvertSpacesBetweenTimesAndNumbersRule();

        self::assertSame(
            '18' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . 'x' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '9',
            $rule->getContentFixed('18 x 9')
        );

        self::assertSame(
            '2' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . 'x' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '3',
            $rule->getContentFixed('2 x 3')
        );
    }

    public function testAddNonBreakingSpaceBetweenWordNummerAndNumberKeepsAllDigits(): void
    {
        $rule = new AddNonBreakingSpaceBetweenWordNummerAndNumberRule();

        self::assertSame(
            'Nr.' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '89',
            $rule->getContentFixed('Nr. 89')
        );

        self::assertSame(
            'Das ist Nummer' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '89.',
            $rule->getContentFixed('Das ist Nummer 89.')
        );
    }

    public function testAddNonBreakingSpaceBetweenGebAndYearKeepsAllCharacters(): void
    {
        $rule = new AddNonBreakingSpaceBetweenGebAndYearRule();

        self::assertSame(
            'geb.' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . '2999',
            $rule->getContentFixed('geb. 2999')
        );

        self::assertSame(
            'geb. & 1723',
            $rule->getContentFixed('geb. & 1723')
        );
    }

    public function testAddSpaceBetweenBracketsAddsSpaceBeforeClosingSquareBracket(): void
    {
        $rule = new AddSpaceBetweenBracketsRule();

        self::assertSame(
            'a [' . CharactersEnum::NON_BREAKING_HAIR_SPACE_UTF8->value . 'b' . CharactersEnum::NON_BREAKING_HAIR_SPACE_UTF8->value . '] c',
            $rule->getContentFixed('a [b] c')
        );
    }

    public function testConvertQuotesToDoubleBottomTopHandlesQuotedTextWithUtf8Characters(): void
    {
        $rule = new ConvertQuotesToDoubleBottomTopRule();

        self::assertSame(
            'Er sagte ' . CharactersEnum::BDQUO->value . 'Hallo — Welt' . CharactersEnum::LDQUO->value . ' zu mir',
            $rule->getContentFixed('Er sagte "Hallo — Welt" zu mir')
        );

        self::assertSame(
            'Er sagte ' . CharactersEnum::BDQUO->value . 'Hallo … Welt' . CharactersEnum::LDQUO->value . ' zu mir',
            $rule->getContentFixed('Er sagte "Hallo … Welt" zu mir')
        );
    }

    public function testConvertDashToEmDashRuleKeepsLineBreaks(): void
    {
        $rule = new ConvertDashToEmDashRule();

        self::assertSame(
            "foo -\nbar",
            $rule->getContentFixed("foo -\nbar")
        );

        self::assertSame(
            'foo — bar',
            $rule->getContentFixed('foo - bar')
        );
    }

    public function testConvertDashToEnDashRuleKeepsLineBreaks(): void
    {
        $rule = new ConvertDashToEnDashRule();

        self::assertSame(
            "foo -\nbar",
            $rule->getContentFixed("foo -\nbar")
        );

        self::assertSame(
            'foo – bar',
            $rule->getContentFixed('foo - bar')
        );
    }

    public function testRemoveSpaceBeforeCommaRuleKeepsLineBreak(): void
    {
        $rule = new RemoveSpaceBeforeCommaRule();

        self::assertSame(
            "foo, \nbar",
            $rule->getContentFixed("foo ,\nbar")
        );

        self::assertSame(
            'Wir glauben, dass das Sinn macht.',
            $rule->getContentFixed('Wir glauben ,dass das Sinn macht.')
        );
    }

    public function testRemoveSpaceBeforeExclamationMarkRuleKeepsLineBreak(): void
    {
        $rule = new RemoveSpaceBeforeExclamationMarkRule();

        self::assertSame(
            "Ja\n!",
            $rule->getContentFixed("Ja\n!")
        );

        self::assertSame(
            'Ich glaube nicht!',
            $rule->getContentFixed('Ich glaube nicht !')
        );
    }

    public function testRemoveSpaceBeforeQuestionMarkRuleKeepsLineBreak(): void
    {
        $rule = new RemoveSpaceBeforeQuestionMarkRule();

        self::assertSame(
            "Ja\n?",
            $rule->getContentFixed("Ja\n?")
        );

        self::assertSame(
            'Glaubst du?',
            $rule->getContentFixed('Glaubst du ?')
        );
    }

    public function testAddSoftHyphenBetweenDashSeparatedWordsRespectsMinLengthWordAfter(): void
    {
        $rule = AddSoftHyphenBetweenDashSeparatedWordsRule::create()
            ->setMinLengthWordBefore(3)
            ->setMinLengthWordAfter(20)
        ;

        self::assertSame(
            'Von Paris/Frankreich',
            $rule->getContentFixed('Von Paris/Frankreich')
        );
    }

    public function testAddSoftHyphenBetweenDashSeparatedWordsStillHyphenatesByDefault(): void
    {
        $rule = AddSoftHyphenBetweenDashSeparatedWordsRule::create();

        self::assertSame(
            'Paris/' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'Frankreich',
            $rule->getContentFixed('Paris/Frankreich')
        );
    }

    public function testAddSoftHyphenBetweenDashSeparatedWordsHandlesWordsWithUmlauts(): void
    {
        $rule = AddSoftHyphenBetweenDashSeparatedWordsRule::create();

        self::assertSame(
            'Straße/' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'Überland',
            $rule->getContentFixed('Straße/Überland')
        );
    }

    public function testAddNonBreakingSpaceBetweenLastAndPenultimateWordsOnlyReplacesTheLastSpace(): void
    {
        $rule = AddNonBreakingSpaceBetweenLastAndPenultimateWords::create()
            ->setNonBreakingSpace('@')
        ;

        self::assertSame(
            "a\xC2\xA0b@end.",
            $rule->getContentFixed("a\xC2\xA0b end.")
        );

        self::assertSame(
            'plain &nbsp; text@end.',
            $rule->getContentFixed('plain &nbsp; text end.')
        );

        self::assertSame(
            'Nur ganz@kurz.',
            $rule->getContentFixed('Nur ganz kurz.')
        );
    }

    public function testPunctuationRulesBindWordsEndingWithUnicodeCharacters(): void
    {
        $nbsp = CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value;

        $exclamationMarkRule = new AddNonBreakingSpaceBeforeExclamationMarkRule();
        $questionMarkRule = new AddNonBreakingSpaceBeforeQuestionMarkRule();

        $this->assertSame(
            'café' . $nbsp . '!',
            $exclamationMarkRule->getContentFixed('café !')
        );

        $this->assertSame(
            'café' . $nbsp . '?',
            $questionMarkRule->getContentFixed('café ?')
        );

        $colonRule = new AddNonBreakingSpaceBeforeColonRule();
        $semicolonRule = new AddNonBreakingSpaceBeforeSemicolonRule();

        $this->assertSame(
            'café' . $nbsp . ': bon',
            $colonRule->getContentFixed('café : bon')
        );

        $this->assertSame(
            'café' . $nbsp . '; bon',
            $semicolonRule->getContentFixed('café ; bon')
        );
    }

    public function testAmpersandAndPlusRulesBindWordsEndingWithUnicodeCharacters(): void
    {
        $nbsp = CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value;

        $ampersandRule = new AddNonBreakingSpaceBeforeAndAfterAmpersandRule();
        $plusRule = new AddNonBreakingSpaceBeforeAndAfterPlusRule();

        $this->assertSame(
            'café' . $nbsp . '&' . $nbsp . 'thé',
            $ampersandRule->getContentFixed('café & thé')
        );

        $this->assertSame(
            'café' . $nbsp . '+' . $nbsp . 'thé',
            $plusRule->getContentFixed('café + thé')
        );
    }

    public function testAddSoftHyphenToWordHyphenatesCompleteUnicodeWords(): void
    {
        $rule = AddSoftHyphenToWordRule::create();

        $this->assertSame(
            'Wörter' . CharactersEnum::SOFT_HYPHEN_UTF8->value
                . 'buch' . CharactersEnum::SOFT_HYPHEN_UTF8->value
                . 'ver' . CharactersEnum::SOFT_HYPHEN_UTF8->value
                . 'zeichnis',
            $rule->getContentFixed('Wörterbuchverzeichnis')
        );
    }

    public function testInvalidUtf8ContentIsNotWipedOnPlainText(): void
    {
        $rule = new AddNonBreakingSpaceBehindWordAfterDotRule();

        $content = "caf\xE9 done";

        $this->assertSame($content, $rule->getContentFixed($content));
        $this->assertSame([], $rule->getViolations($content));
    }

    public function testInvalidUtf8ContentIsNotCorruptedInHtmlInput(): void
    {
        $rule = new RemoveDuplicatedWhitespaceRule();

        $content = "<p>caf\xE9 done</p>";

        $this->assertSame($content, $rule->getContentFixed($content));
        $this->assertSame([], $rule->getViolations($content));
    }

    public function testAddNonBreakingSpaceBetweenLastAndPenultimateWordsKeepsLineBreak(): void
    {
        $rule = AddNonBreakingSpaceBetweenLastAndPenultimateWords::create();

        $this->assertSame(
            "Das ist das\nEnde.",
            $rule->getContentFixed("Das ist das\nEnde.")
        );
    }
}
