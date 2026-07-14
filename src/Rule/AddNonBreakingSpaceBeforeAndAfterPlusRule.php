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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBeforeAndAfterPlusRuleTest
 */
#[Description(
    'Add non-breaking spaces before and after plus (`+`) characters. This rule affects only situations, where the plus character has whitespaces before and after (`T + D` or `Tobias + Deborah`).',
)]
#[TransformationExample(
    'Welcome to Tobias + Deborah!',
    'Welcome to Tobias\xE2\x80\xAF+\xE2\x80\xAFDeborah!',
    'With a thin utf-8 non-breaking space (`\xE2\x80\xAF`)'
)]
#[TransformationExample(
    'Welcome to T + D!',
    'Welcome to T&#8239;+&#8239;D!',
    'With a thin HTML non-breaking space (`&#8239;`)'
)]
class AddNonBreakingSpaceBeforeAndAfterPlusRule extends AbstractRule implements RuleInterface
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
        return '/(\d+|\w+)(' . CharactersEnum::getAllSpacesRegex() . ')+\+(' . CharactersEnum::getAllSpacesRegex() . ')+(\d+|\w+)/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '+' . $this->nonBreakingSpace . '$4';
    }

    #[Configuration('Configure the type of the space. Per default, a thin non-breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
