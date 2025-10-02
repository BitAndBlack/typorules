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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNumberAndJhRuleTest
 */
#[Description(
    'Add a non-breaking space between a number (ending with a dot) and the following word `Jh.` to disallow separating them from each other. '
    . '*Attention*: This rule may also find numbers at the end of a sentence, where the new sentence starts with `Jh.`. It should only be used manually.'
)]
#[TransformationExample(
    'Im 18. Jh.',
    'Im 18.\xC2\xA0Jh.',
)]
class AddNonBreakingSpaceBetweenNumberAndJhRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE->value;
    }

    public function getSearchPattern(): string
    {
        return '/(?<=\d\.)[' . CharactersEnum::ALL_SPACES->value . ']*(?=Jh\.)/';
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
