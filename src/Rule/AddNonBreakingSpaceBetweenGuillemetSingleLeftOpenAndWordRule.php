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
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRuleTest
 */
#[Description(
    'Add a thin non breaking space between between a single left angle quote `‹` and a word **after** to disallow separating those two.'
)]
#[TransformationExample(
    'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui › ».',
    'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹\xE2\x80\xAFoui › ».',
)]
class AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule extends AbstractRule implements RuleInterface
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
        return '/(?<=' . CharactersEnum::LEFT_ANGLE_QUOTE_SINGLE->value . ')(' . CharactersEnum::ALL_SPACES->value . ')*(?=\w)/';
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
