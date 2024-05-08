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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRuleTest
 */
#[Description(
    'Add a thin non breaking space between between a single right angle quote `›` and a word **before** to disallow separating those two.'
)]
#[TransformationExample(
    'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui › ».',
    'Je t\'ai dit « non », car « tout à l\'heure, tu m\'as dit ‹ oui\xE2\x80\xAF› ».',
)]
class AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule extends AbstractRule implements RuleInterface
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
        return '/(?<=\w)(' . CharactersEnum::ALL_SPACES->value . ')*(?=' . CharactersEnum::RIGHT_ANGLE_QUOTE_SINGLE->value . ')/';
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
