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
use BitAndBlack\TypoRules\Rule;

#[Description(
    'A set of rules for an advanced typography. This can be used in DTP applications, for example.'
)]
class AdvancedTypographyRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new Rule\AddNonBreakingSpaceBehindWordAfterColonRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterCommaRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterDotRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterEmDashRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterEnDashRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterExclamationMarkRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterQuestionMarkRule(),
            new Rule\AddNonBreakingSpaceBehindWordAfterSemicolonRule(),
            new Rule\AddNonBreakingSpaceBetweenLastAndPenultimateWords(),
            new Rule\AddSoftHyphenToWordRule(),
            new Rule\AddSpaceBetweenBracketsRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
