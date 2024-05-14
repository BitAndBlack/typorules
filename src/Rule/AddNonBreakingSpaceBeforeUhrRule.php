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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBeforeUhrRuleTest
 */
#[Description(
    'Add a non-breaking space before the word `Uhr` to disallow separating it from the time before.'
)]
#[TransformationExample(
    'Es ist 12.30 Uhr.',
    'Es ist 12.30\xC2\xA0Uhr.',
)]
class AddNonBreakingSpaceBeforeUhrRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE->value;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\d)(' . CharactersEnum::ALL_SPACES->value . ')+(Uhr)/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '$3';
    }

    #[Configuration('Configure the type of the space. Per default, a non-breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
