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

/**
 * This class doesn't contain any rule sets per default.
 * You can use it to include and exclude rules completely by your own.
 */
#[Description(
    'An empty set of rules that can be configured completely by yourself.'
)]
class CustomRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public static function create(): self
    {
        return new self();
    }
}
