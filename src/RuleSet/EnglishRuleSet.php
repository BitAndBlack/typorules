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
    'A set of rules that can handle english words and english typography.'
)]
class EnglishRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new Rule\AddNonBreakingSpaceAfterDoctorRule(),
            new Rule\AddNonBreakingSpaceAfterProfessorRule(),
            new Rule\AddNonBreakingSpaceBeforeAndAfterAmpersandRule(),
            new Rule\AddNonBreakingSpaceBetweenNumberAndNumberRule(),
            new Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule(),
            new Rule\AddSpaceBehindDotRule(),
            new Rule\AddSpaceBehindExclamationMarkRule(),
            new Rule\AddSpaceBehindQuestionMarkRule(),
            new Rule\ConvertCharactersToAtCharRule(),
            new Rule\ConvertCharactersToCopyrightCharRule(),
            new Rule\ConvertCharactersToRegisteredCharRule(),
            new Rule\ConvertCharactersToTrademarkCharRule(),
            new Rule\ConvertDashToEmDashRule(),
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
