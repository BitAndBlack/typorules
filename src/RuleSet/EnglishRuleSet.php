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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterDoctorRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterProfessorRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndNumberRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindDotRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindExclamationMarkRule;
use BitAndBlack\TypoRules\Rule\AddSpaceBehindQuestionMarkRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToAtCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToCopyrightCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToRegisteredCharRule;
use BitAndBlack\TypoRules\Rule\ConvertCharactersToTrademarkCharRule;
use BitAndBlack\TypoRules\Rule\ConvertDashToEmDashRule;
use BitAndBlack\TypoRules\Rule\ConvertDotsToEllipsisRule;
use BitAndBlack\TypoRules\Rule\ConvertSpacesBetweenTimesAndNumbersRule;
use BitAndBlack\TypoRules\Rule\ConvertXToTimesBetweenNumbersRule;
use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use BitAndBlack\TypoRules\Rule\RemoveSpaceBeforeCommaRule;
use BitAndBlack\TypoRules\Rule\RemoveUnnecessaryExclamationMarksRule;
use BitAndBlack\TypoRules\Rule\RemoveUnnecessaryQuestionMarksRule;

#[Description(
    'A set of rules that can handle english words and english typography.'
)]
class EnglishRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new AddNonBreakingSpaceAfterDoctorRule(),
            new AddNonBreakingSpaceAfterProfessorRule(),
            new AddNonBreakingSpaceBetweenNumberAndNumberRule(),
            new AddNonBreakingSpaceBetweenNumberAndUnitRule(),
            new AddSpaceBehindDotRule(),
            new AddSpaceBehindExclamationMarkRule(),
            new AddSpaceBehindQuestionMarkRule(),
            new ConvertCharactersToAtCharRule(),
            new ConvertCharactersToCopyrightCharRule(),
            new ConvertCharactersToRegisteredCharRule(),
            new ConvertCharactersToTrademarkCharRule(),
            new ConvertDashToEmDashRule(),
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
