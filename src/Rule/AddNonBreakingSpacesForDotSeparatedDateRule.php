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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpacesForDotSeparatedDateRuleTest
 */
#[Description(
    'Add thin non-breaking spaces between the number of a dot separated date.'
)]
#[TransformationExample(
    '01.03.2025',
    '1.\xE2\x80\xA3.\xE2\x80\xA2025',
    'Without spaces at the beginning'
)]
#[TransformationExample(
    '01. 03. 2025',
    '1.\xE2\x80\xA3.\xE2\x80\xA2025',
    'With spaces at the beginning'
)]
#[TransformationExample(
    '01.03.2025',
    '1.&#8239;3.&#8239;2025',
    'With a narrow non-breaking space for HTML (`&#8239;`)'
)]
class AddNonBreakingSpacesForDotSeparatedDateRule extends AbstractRule implements RuleInterface
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
        return '/(\d?\d\.)[' . CharactersEnum::ALL_SPACES->value . ']*(\d?\d\.)[' . CharactersEnum::ALL_SPACES->value . ']*(\d{4}|\d{2})/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '$2' . $this->nonBreakingSpace . '$3';
    }

    #[Configuration('Configure the type of the space. Per default, a thin non-breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
