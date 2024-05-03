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

use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeColonRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeSemicolonRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindDotRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\BindNumberToNumberRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToAtCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToCopyrightCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToRegisteredCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToTrademarkCharRule;
use BitAndBlack\TypoRules\Rule\ConvertDashToEnDashRule;
use BitAndBlack\TypoRules\Rule\ConvertDotsToEllipsisRule;
use BitAndBlack\TypoRules\Rule\ConvertSpacesBetweenTimesAndNumbersRule;
use BitAndBlack\TypoRules\Rule\ConvertXToTimesBetweenNumbersRule;
use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeCommaRule;
use BitAndBlack\TypoRules\Rule\RemoveUnnecessaryExclamationMarksRule;
use BitAndBlack\TypoRules\Rule\RemoveUnnecessaryQuestionMarksRule;

class FrenchRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new AddNonBreakingSpaceBetweenNumberAndUnitRule(),
            new AddNonBreakingSpaceBeforeColonRule(),
            new AddNonBreakingSpaceBeforeExclamationMarkRule(),
            new AddNonBreakingSpaceBeforeQuestionMarkRule(),
            new AddNonBreakingSpaceBeforeSemicolonRule(),
            new AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule(),
            new AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule(),
            new AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule(),
            new AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule(),
            new AddSpaceBehindDotRule(),
            new AddSpaceBehindExclamationMarkRule(),
            new AddSpaceBehindQuestionMarkRule(),
            new BindNumberToNumberRule(),
            new ConvertCharactersToAtCharRule(),
            new ConvertCharactersToCopyrightCharRule(),
            new ConvertCharactersToRegisteredCharRule(),
            new ConvertCharactersToTrademarkCharRule(),
            new ConvertDashToEnDashRule(),
            new ConvertDotsToEllipsisRule(),
            new ConvertSpacesBetweenTimesAndNumbersRule(),
            new ConvertXToTimesBetweenNumbersRule(),
            new RemoveDuplicatedWhitespaceRule(),
            new RemoveSpaceBeforeCommaRule(),
            new RemoveUnnecessaryExclamationMarksRule(),
            new RemoveUnnecessaryQuestionMarksRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
