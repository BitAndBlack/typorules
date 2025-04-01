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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBeforeAndAfterAmpersandRuleTest
 */
#[Description(
    'Add non-breaking spaces before and after ampersand characters. This rule affects only situations, where the ampersand has whitespaces before and after (`T & D` or `Tobias & Deborah`).',
)]
#[TransformationExample(
    'Welcome to Tobias & Deborah!',
    'Welcome to Tobias\xE2\x80\xAF&\xE2\x80\xAFDeborah!',
    'With a thin non-breaking space (`\xE2\x80\xAF`)'
)]
#[TransformationExample(
    'Welcome to Tobias & Deborah!',
    'Welcome to Tobias&#8239;&&#8239;Deborah!',
    'With a narrow non-breaking space for HTML (`&#8239;`)'
)]
class AddNonBreakingSpaceBeforeAndAfterAmpersandRule extends AbstractRule implements RuleInterface
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
        return '/(\d+|\w+)(' . CharactersEnum::ALL_SPACES->value . ')+&(' . CharactersEnum::ALL_SPACES->value . ')+(\d+|\w+)/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '&' . $this->nonBreakingSpace . '$4';
    }

    #[Configuration('Configure the type of the space. Per default, a thin non-breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
