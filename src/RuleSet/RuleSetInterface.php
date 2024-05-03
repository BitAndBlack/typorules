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

interface RuleSetInterface
{
    public static function create(): self;

    /**
     * Returns a list of all rules in this rule set.
     *
     * @return array<int, RuleInterface>
     */
    public function getRuleSet(): array;

    /**
     * Returns a list of all violations in the given input.
     *
     * @return array<int, Violation>
     */
    public function getViolations(string $content): array;

    /**
     * Returns the fixed content.
     *
     * @return string
     */
    public function getContentFixed(string $content): string;

    /**
     * Adds one or more rules to the set list.
     *
     * @return RuleSetInterface
     */
    public function withRule(RuleInterface ...$rules): RuleSetInterface;

    /**
     * Removes one or more rules from the set list.
     *
     * @param RuleInterface|class-string<RuleInterface> ...$rules
     * @return RuleSetInterface
     */
    public function withoutRule(RuleInterface|string ...$rules): RuleSetInterface;

    /**
     * Adds one or more rule sets with all its rules to the set list.
     *
     * @return RuleSetInterface
     */
    public function withRuleSet(RuleSetInterface ...$ruleSets): RuleSetInterface;

    /**
     * Removes one or more rule sets with all its rules from the set list.
     *
     * @param RuleSetInterface|class-string<RuleSetInterface> ...$ruleSets
     * @return RuleSetInterface
     */
    public function withoutRuleSet(RuleSetInterface|string ...$ruleSets): RuleSetInterface;
}
