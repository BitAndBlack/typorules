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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterDoctorRule;
use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use BitAndBlack\TypoRules\Rule\RemoveWhitespaceAtBeginningRule;
use PHPUnit\Framework\TestCase;

/**
 * Covers the shared HTML and offset handling of {@see \BitAndBlack\TypoRules\Rule\AbstractRule}.
 */
final class AbstractRuleTest extends TestCase
{
    public function testKeepsHtmlEntities(): void
    {
        $rule = new RemoveWhitespaceAtBeginningRule();

        self::assertSame(
            '<p>foo &lt; bar</p>',
            $rule->getContentFixed('<p>foo &lt; bar</p>')
        );

        self::assertSame(
            '<p>A &amp; B</p>',
            $rule->getContentFixed('<p>A &amp; B</p>')
        );
    }

    public function testKeepsWhitespaceOnlyTextNodes(): void
    {
        $rule = new RemoveWhitespaceAtBeginningRule();

        $content = "<div>\n  <p>foo</p>\n  <p>baz</p>\n</div>";

        self::assertSame(
            $content,
            $rule->getContentFixed($content)
        );
    }

    public function testAppliesRuleToHtmlTextNodes(): void
    {
        $rule = new AddNonBreakingSpaceAfterDoctorRule();

        self::assertSame(
            '<p>Dr.' . CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value . 'Max</p>',
            $rule->getContentFixed('<p>Dr. Max</p>')
        );
    }

    public function testViolationPositionIsCharacterBasedInPlainText(): void
    {
        $rule = new RemoveDuplicatedWhitespaceRule();

        $violations = $rule->getViolations('wét  x');

        self::assertNotEmpty($violations);

        self::assertSame(
            3,
            $violations[0]->getViolationPosition()
        );
    }

    public function testViolationPositionIsRelativeToWholeHtmlDocument(): void
    {
        $rule = new RemoveWhitespaceAtBeginningRule();

        $content = '<p>Alpha</p><p> Beta</p>';

        $violations = $rule->getViolations($content);

        self::assertNotEmpty($violations);

        self::assertSame(
            15,
            $violations[0]->getViolationPosition()
        );

        self::assertSame(
            '<p>Alpha</p><p>Beta</p>',
            $rule->getContentFixed($content)
        );
    }
}
