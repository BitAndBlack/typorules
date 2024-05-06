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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSoftHyphenBetweenDashSeparatedWordsRuleTest
 */
#[Description(
    'Add a non breaking space between between to words that have a dash between `/` to **allow** separating those two. This can improve the text wrap when having long words-'
)]
#[TransformationExample(
    'Von Paris/Frankreich nach Stuttgart/Deutschland.',
    "Von Paris/\xC2\xADFrankreich nach Stuttgart/\xC2\xADDeutschland.",
)]
class AddSoftHyphenBetweenDashSeparatedWordsRule extends AbstractRule implements RuleInterface
{
    protected int $minLengthWordBefore;

    protected int $minLengthWordAfter;

    public function __construct()
    {
        $this->minLengthWordBefore = 3;
        $this->minLengthWordAfter = 3;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\w{' . $this->minLengthWordBefore . ',})\/(\w{' . $this->minLengthWordBefore . ',})/';
    }

    public function getReplacePattern(): string
    {
        return '$1/' . CharactersEnum::SOFT_HYPHEN->value . '$2';
    }

    public function setMinLengthWordBefore(int $minLengthWordBefore): self
    {
        $this->minLengthWordBefore = $minLengthWordBefore;
        return $this;
    }

    public function setMinLengthWordAfter(int $minLengthWordAfter): self
    {
        $this->minLengthWordAfter = $minLengthWordAfter;
        return $this;
    }
}
