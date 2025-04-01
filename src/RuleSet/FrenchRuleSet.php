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
    'A set of rules that can handle french words and french typography.'
)]
class FrenchRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new Rule\AddNonBreakingSpaceBeforeAndAfterAmpersandRule(),
            new Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule(),
            new Rule\AddNonBreakingSpaceBeforeColonRule(),
            new Rule\AddNonBreakingSpaceBeforeExclamationMarkRule(),
            new Rule\AddNonBreakingSpaceBeforeQuestionMarkRule(),
            new Rule\AddNonBreakingSpaceBeforeSemicolonRule(),
            new Rule\AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule(),
            new Rule\AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule(),
            new Rule\AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule(),
            new Rule\AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule(),
            new Rule\AddNonBreakingSpaceBetweenWordNumeroAndNumberRule(),
            new Rule\AddSpaceBehindDotRule(),
            new Rule\AddSpaceBehindExclamationMarkRule(),
            new Rule\AddSpaceBehindQuestionMarkRule(),
            new Rule\ConvertCharactersToAtCharRule(),
            new Rule\ConvertCharactersToCopyrightCharRule(),
            new Rule\ConvertCharactersToRegisteredCharRule(),
            new Rule\ConvertCharactersToTrademarkCharRule(),
            new Rule\ConvertDashToEnDashRule(),
            new Rule\ConvertDotsToEllipsisRule(),
            new Rule\ConvertSpacesBetweenTimesAndNumbersRule(),
            new Rule\ConvertXToTimesBetweenNumbersRule(),
            new Rule\RemoveDuplicatedWhitespaceRule(),
            new Rule\RemoveSpaceBeforeCommaRule(),
            new Rule\RemoveUnnecessaryExclamationMarksRule(),
            new Rule\RemoveUnnecessaryQuestionMarksRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
