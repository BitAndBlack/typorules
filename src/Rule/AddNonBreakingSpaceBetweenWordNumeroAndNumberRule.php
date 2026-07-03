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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNumeroAndNumberRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `n°` or `numéro` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'C\'est le n° 8.',
    'C\'est le n°\xE2\x80\xAF8.',
    'With a thin utf-8 non-breaking space (`\xE2\x80\xAF`)'
)]
#[TransformationExample(
    'C\'est le numéro 8.',
    'C\'est le numéro&#8239;8.',
    'With a thin HTML non-breaking space (`&#8239;`)'
)]
#[TransformationExample(
    'N°8',
    'N°\xE2\x80\xAF8',
)]
class AddNonBreakingSpaceBetweenWordNumeroAndNumberRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->preferUtf8OverHtmlCharacters();
    }

    public static function create(): self
    {
        return new self();
    }

    public function preferHtmlOverUtf8Characters(): self
    {
        return $this->setNonBreakingSpace(
            CharactersEnum::NON_BREAKING_SPACE_THIN_HTML->value
        );
    }

    public function preferUtf8OverHtmlCharacters(): self
    {
        return $this->setNonBreakingSpace(
            CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8->value
        );
    }

    public function getSearchPattern(): string
    {
        return '/(?<=[Nn]°|[Nn]uméro)[' . CharactersEnum::getAllSpacesRegex() . ']*(?=\d)/';
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
