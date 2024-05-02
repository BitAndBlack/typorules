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

use BitAndBlack\TypoRules\Rule\AddSoftHyphenToWordRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBetweenBracketsRule;
use BitAndBlack\TypoRules\Rule\BindWordAfterColonRule;
use BitAndBlack\TypoRules\Rule\BindWordAfterDotRule;

class AdvancedTypographyRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new AddSoftHyphenToWordRule(),
            new AddSpaceBetweenBracketsRule(),
            new BindWordAfterDotRule(),
            new BindWordAfterColonRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
