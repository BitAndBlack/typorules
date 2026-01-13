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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenLastAndPenultimateWordsTest
 */
#[Description(
    'Add a non-breaking space between the last and the penultimate words. Binding those words may lead to a more balanced text layout, where the last text row can\'t contain a single word only.'
)]
#[TransformationExample(
    'A short last word at the end.',
    'A short last word at the\xC2\xA0end.',
)]
class AddNonBreakingSpaceBetweenLastAndPenultimateWords extends AbstractRule implements RuleInterface
{
    /**
     * @var positive-int
     */
    protected int $lastWordMaxLength = 6;

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
        return '/' . CharactersEnum::ALL_SPACES->value . '(?=\w{,' . $this->lastWordMaxLength . '}[\.|\!|\?])/u';
    }

    public function getReplacePattern(): string
    {
        return $this->nonBreakingSpace;
    }

    /**
     * @return positive-int
     */
    public function getLastWordMaxLength(): int
    {
        return $this->lastWordMaxLength;
    }

    /**
     * @param positive-int $lastWordMaxLength
     * @return $this
     */
    #[Configuration('Configure the maximum length for the last word. It\'s `6` characters per default.')]
    public function setLastWordMaxLength(int $lastWordMaxLength): self
    {
        $this->lastWordMaxLength = $lastWordMaxLength;
        return $this;
    }

    #[Configuration('Configure the type of the space.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
