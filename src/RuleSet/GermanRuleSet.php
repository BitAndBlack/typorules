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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeUhrRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenEingetragenerAndVereinRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndJahrRule;
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

#[Description(
    'A set of rules that can handle german words and german typography.'
)]
class GermanRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new AddNonBreakingSpaceAfterDoctorRule(),
            new AddNonBreakingSpaceAfterProfessorRule(),
            new AddNonBreakingSpaceBeforeUhrRule(),
            new AddNonBreakingSpaceBetweenEingetragenerAndVereinRule(),
            new AddNonBreakingSpaceBetweenNumberAndJahrRule(),
            new AddNonBreakingSpaceBetweenNumberAndUnitRule(),
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
