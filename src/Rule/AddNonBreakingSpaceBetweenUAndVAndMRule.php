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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenUAndVAndMRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `u.` (or `U.`), `v.` (or `V.`) and `m.` (or `M.`) to disallow separating them from each other. '
)]
#[TransformationExample(
    'u. v. m.',
    'u.\xE2\x80\xAFv.\xE2\x80\xAFm.',
    'With a thin utf-8 non-breaking space (`\xE2\x80\xAF`)'
)]
class AddNonBreakingSpaceBetweenUAndVAndMRule extends AbstractRule implements RuleInterface
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
        return '/(?<=^|' . CharactersEnum::getAllSpacesRegex() . '|\(|\[)([u|U]\.)[' . CharactersEnum::getAllSpacesRegex() . ']*([v|V]\.)[' . CharactersEnum::getAllSpacesRegex() . ']*([m|M]\.)/';
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
