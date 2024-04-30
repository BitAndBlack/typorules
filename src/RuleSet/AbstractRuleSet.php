<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\RuleSet;

use BitAndBlack\TypoRules\Rule\RuleInterface;
use BitAndBlack\TypoRules\Violation;

/**
 * @see \BitAndBlack\TypoRules\Tests\RuleSet\AbstractRuleSetTest
 */
abstract class AbstractRuleSet implements RuleSetInterface
{
    /**
     * @var array<int, RuleInterface>
     */
    protected array $ruleset = [];

    /**
     * Returns a list of all rules in this rule set.
     *
     * @return array<int, RuleInterface>
     */
    public function getRuleSet(): array
    {
        return $this->ruleset;
    }

    /**
     * Returns a list of all violations in the given input.
     *
     * @return array<int, Violation>
     */
    public function getViolations(string $content): array
    {
        $violations = [];

        foreach ($this->getRuleSet() as $rule) {
            array_push(
                $violations,
                ...$rule->getViolations($content)
            );
        }

        return $violations;
    }

    /**
     * Returns the fixed content.
     *
     * @param string $content
     * @return string
     */
    public function getContentFixed(string $content): string
    {
        foreach ($this->getRuleSet() as $rule) {
            $content = $rule->getContentFixed($content);
        }

        return $content;
    }

    /**
     * Adds one or more rules to the set list.
     *
     * @param RuleInterface ...$rules
     * @return AbstractRuleSet
     */
    public function withRule(RuleInterface ...$rules): self
    {
        foreach ($rules as $rule) {
            if (!in_array($rule, $this->ruleset, true)) {
                $this->ruleset[] = $rule;
            }
        }

        return $this;
    }

    /**
     * Removes one or more rules from the set list.
     *
     * @param RuleInterface|class-string<RuleInterface> ...$rules
     * @return AbstractRuleSet
     */
    public function withoutRule(RuleInterface|string ...$rules): self
    {
        foreach ($rules as $rule) {
            if ($rule instanceof RuleInterface) {
                $rule = $rule::class;
            }

            foreach ($this->ruleset as $ruleKey => $ruleInstance) {
                $ruleClass = $ruleInstance::class;

                if ($ruleClass === $rule) {
                    unset($this->ruleset[$ruleKey]);
                }
            }
        }

        return $this;
    }
}
