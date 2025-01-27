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

use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterColonRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterCommaRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterDotRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterEmDashRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterEnDashRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBehindWordAfterSemicolonRule;
use BitAndBlack\TypoRules\Rule\AddSoftHyphenToWordRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBetweenBracketsRule;

#[Description(
    'A set of rules for an advanced typography. This can be used in DTP applications, for example.'
)]
class AdvancedTypographyRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new AddNonBreakingSpaceBehindWordAfterColonRule(),
            new AddNonBreakingSpaceBehindWordAfterCommaRule(),
            new AddNonBreakingSpaceBehindWordAfterDotRule(),
            new AddNonBreakingSpaceBehindWordAfterEmDashRule(),
            new AddNonBreakingSpaceBehindWordAfterEnDashRule(),
            new AddNonBreakingSpaceBehindWordAfterExclamationMarkRule(),
            new AddNonBreakingSpaceBehindWordAfterQuestionMarkRule(),
            new AddNonBreakingSpaceBehindWordAfterSemicolonRule(),
            new AddSoftHyphenToWordRule(),
            new AddSpaceBetweenBracketsRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
