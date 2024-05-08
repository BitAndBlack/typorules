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
use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindWordAfterDotRuleTest
 */
#[Description(
    'Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a dot. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.'
)]
#[TransformationExample(
    'Schon vorbei. Von wegen!',
    'Schon vorbei. Von\xC2\xA0wegen!',
)]
class BindWordAfterDotRule extends AbstractRule implements RuleInterface
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
        return '/(?<=\.\s)(\w{1,' . $this->wordMaxLength . '})\s(\w{0,' . $this->wordAheadMaxLength . '})(?!\w)/u';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace . '$2';
    }

    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }

    public function setWordMaxLength(int $wordMaxLength): self
    {
        $this->wordMaxLength = $wordMaxLength;
        return $this;
    }

    public function setWordAheadMaxLength(int $wordAheadMaxLength): self
    {
        $this->wordAheadMaxLength = $wordAheadMaxLength;
        return $this;
    }
}
