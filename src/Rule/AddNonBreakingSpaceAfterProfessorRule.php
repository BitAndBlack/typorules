<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Rule;

use BitAndBlack\TypoRules\CharactersEnum;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceAfterProfessorRuleTest
 */
class AddNonBreakingSpaceAfterProfessorRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }

    public function getSearchPattern(): string
    {
        return '/(Prof\.)(' . CharactersEnum::ALL_SPACES->value . ')+/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace;
    }

    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
