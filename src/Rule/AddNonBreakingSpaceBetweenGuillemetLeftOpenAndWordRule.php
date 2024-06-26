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
use BitAndBlack\TypoRules\Documentation\Configuration;
use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRuleTest
 */
#[Description(
    'Add a thin non-breaking space between a left angle quote `«` and a word **after** to disallow separating those two.'
)]
#[TransformationExample(
    'J\'ai dit « non » à toi.',
    'J\'ai dit «\xE2\x80\xAFnon » à toi.',
)]
class AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule extends AbstractRule implements RuleInterface
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
        return '/(?<=' . CharactersEnum::LEFT_ANGLE_QUOTE->value . ')(' . CharactersEnum::ALL_SPACES->value . ')*(?=\w)/';
    }

    public function getReplacePattern(): string
    {
        return $this->nonBreakingSpace;
    }

    #[Configuration('Configure the type of the space. Per default, a thin non-breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
