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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenWordNummerAndNumberRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `Nr.` or `Nummer` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'Das ist Nr. 8.',
    'Das ist Nr.\xE2\x80\xAF8.',
    'With a thin utf-8 non-breaking space (`\xE2\x80\xAF`)'
)]
#[TransformationExample(
    'Das ist Nummer 8.',
    'Das ist Nummer&#8239;8.',
    'With a thin HTML non-breaking space (`&#8239;`)'
)]
class AddNonBreakingSpaceBetweenWordNummerAndNumberRule extends AbstractRule implements RuleInterface
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
        return '/(?<=Nr\.|[Nn]ummer)[' . CharactersEnum::getAllSpacesRegex() . ']*(?=\d)/';
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
