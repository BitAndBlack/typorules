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
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindWordAfterEnDashRuleTest
 */
#[Description(
    'Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a en dash. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.'
)]
#[TransformationExample(
    'Schon vorbei – von wegen!',
    'Schon vorbei – von\xC2\xA0wegen!',
)]
class BindWordAfterEnDashRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    protected int $wordMaxLength;

    protected int $wordAheadMaxLength;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE->value;
        $this->wordMaxLength = 3;
        $this->wordAheadMaxLength = 5;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(?<=' . CharactersEnum::NDASH->value . '\s)(\w{1,' . $this->wordMaxLength . '})\s(\w{0,' . $this->wordAheadMaxLength . '})(?!\w)/u';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '$2';
    }

    #[Configuration('Configure the type of the space. Per default, a non breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }

    #[Configuration('Configure the minimum length for the word after the en dash. It needs to have a length of at least `3` characters per default.')]
    public function setWordMaxLength(int $wordMaxLength): self
    {
        $this->wordMaxLength = $wordMaxLength;
        return $this;
    }

    #[Configuration('Configure the maximum length for the **second** word after the en dash. By default, it must not have more than `5` characters.')]
    public function setWordAheadMaxLength(int $wordAheadMaxLength): self
    {
        $this->wordAheadMaxLength = $wordAheadMaxLength;
        return $this;
    }
}
