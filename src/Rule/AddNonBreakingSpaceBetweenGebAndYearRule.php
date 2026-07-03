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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenGebAndYearRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the word `geb.` and the following year to disallow separating them from each other. '
    . '*Attention*: This rule may also find numbers at the beginning of a sentence, where the previous sentence ends with `geb.`. It should only be used manually.'
)]
#[TransformationExample(
    'Tobias Mayer (geb. 1723)',
    'Tobias Mayer (geb.\xE2\x80\xAF1723)',
    'With a thin utf-8 non-breaking space (`\xE2\x80\xAF`)'
)]
class AddNonBreakingSpaceBetweenGebAndYearRule extends AbstractRule implements RuleInterface
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
        return '/(?<=geb\.)[' . CharactersEnum::getAllSpacesRegex() . ']*(?=\d{3,4})/';
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
