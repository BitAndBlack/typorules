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

use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use BitAndBlack\TypoRules\RuleSet\AbstractRuleSet;
use PHPUnit\Framework\TestCase;

class AbstractRuleSetTest extends TestCase
{
    public function testCanAddRules(): void
    {
        $rule = new RemoveDuplicatedWhitespaceRule();

        $ruleSet = new class() extends AbstractRuleSet {
            public static function create(): self
            {
                return new self();
            }
        };

        $ruleSet->withRule($rule);
        $ruleSet->withRule($rule, $rule, $rule);

        $rules = $ruleSet->getRuleSet();

        self::assertCount(
            1,
            $rules
        );

        self::assertContains(
            $rule,
            $rules
        );
    }

    public function testCanRemoveRules(): void
    {
        $ruleSet = new class() extends AbstractRuleSet {
            public function __construct()
            {
                $this->withRule(
                    new RemoveDuplicatedWhitespaceRule(),
                );
            }

            public static function create(): self
            {
                return new self();
            }
        };

        $ruleSet->withoutRule(new RemoveDuplicatedWhitespaceRule());

        $rules = $ruleSet->getRuleSet();

        self::assertCount(
            0,
            $rules
        );

        self::assertNotContains(
            RemoveDuplicatedWhitespaceRule::class,
            $rules
        );
    }
}
