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
use BitAndBlack\TypoRules\Documentation\Description;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBeforeQuestionMarkRuleTest
 */
#[Description(
    'Add a non breaking space between before a question mark to disallow separating it from the word before.'
)]
class AddNonBreakingSpaceBeforeQuestionMarkRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(?<=\w)(' . CharactersEnum::ALL_SPACES->value . ')*(?=\?)/';
    }

    public function getReplacePattern(): string
    {
        return $this->nonBreakingSpace;
    }

    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
