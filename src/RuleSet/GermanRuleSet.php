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
    'A set of rules that can handle german words and german typography.'
)]
class GermanRuleSet extends AbstractRuleSet implements RuleSetInterface
{
    public function __construct()
    {
        $this->withRule(
            new Rule\AddNonBreakingSpaceAfterDoctorRule(),
            new Rule\AddNonBreakingSpaceAfterProfessorRule(),
            new Rule\AddNonBreakingSpaceBeforeAndAfterAmpersandRule(),
            new Rule\AddNonBreakingSpaceBeforeUhrRule(),
            new Rule\AddNonBreakingSpaceBetweenEingetragenerAndVereinRule(),
            new Rule\AddNonBreakingSpaceBetweenNumberAndJahrRule(),
            new Rule\AddNonBreakingSpaceBetweenWordNummerAndNumberRule(),
            new Rule\AddNonBreakingSpaceBetweenNumberAndUnitRule(),
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
            new Rule\RemoveSpaceBeforeExclamationMarkRule(),
            new Rule\RemoveSpaceBeforeQuestionMarkRule(),
            new Rule\RemoveUnnecessaryExclamationMarksRule(),
            new Rule\RemoveUnnecessaryQuestionMarksRule(),
        );
    }

    public static function create(): self
    {
        return new self();
    }
}
