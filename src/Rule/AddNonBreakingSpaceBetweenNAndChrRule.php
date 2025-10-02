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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNAndChrRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `n.` and `Chr.` to disallow separating them from each other. '
    . '*Attention*: This rule may also find situations, where those words mark an end and a beginning of a sentence. It should only be used manually.'
)]
#[TransformationExample(
    '25 n. Chr.',
    '25 n.\xE2\x80\xAFChr.',
)]
class AddNonBreakingSpaceBetweenNAndChrRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }

    public function getSearchPattern(): string
    {
        return '/(?<=n\.)[' . CharactersEnum::ALL_SPACES->value . ']*(?=Chr\.)/';
    }

    public static function create(): self
    {
        return new self();
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
