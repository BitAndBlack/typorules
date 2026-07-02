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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSoftHyphenBetweenDashSeparatedWordsRuleTest
 */
#[Description(
    'Add a non-breaking space between to words that have a dash between `/` to **allow** separating those two. This can improve the text wrap when having long words-'
)]
#[TransformationExample(
    'Von Paris/Frankreich nach Stuttgart/Deutschland.',
    'Von Paris/\xC2\xADFrankreich nach Stuttgart/\xC2\xADDeutschland.',
)]
class AddSoftHyphenBetweenDashSeparatedWordsRule extends AbstractRule implements RuleInterface
{
    protected int $minLengthWordBefore = 3;

    protected int $minLengthWordAfter = 3;

    protected string $softHyphen;

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
        return $this->setSoftHyphen(
            CharactersEnum::SOFT_HYPHEN_HTML->value
        );
    }

    public function preferUtf8OverHtmlCharacters(): self
    {
        return $this->setSoftHyphen(
            CharactersEnum::SOFT_HYPHEN_UTF8->value
        );
    }

    public function getSearchPattern(): string
    {
        return '/(\w{' . $this->minLengthWordBefore . ',})\/(\w{' . $this->minLengthWordBefore . ',})/';
    }

    public function getReplacePattern(): string
    {
        return '$1/' . $this->softHyphen . '$2';
    }

    #[Configuration('Configure the minimum length for the word **before** the dash. It needs to have a length of `3` characters per default.')]
    public function setMinLengthWordBefore(int $minLengthWordBefore): self
    {
        $this->minLengthWordBefore = $minLengthWordBefore;
        return $this;
    }

    #[Configuration('Configure the minimum length for the word **after** the dash. It needs to have a length of `3` characters per default.')]
    public function setMinLengthWordAfter(int $minLengthWordAfter): self
    {
        $this->minLengthWordAfter = $minLengthWordAfter;
        return $this;
    }

    #[Configuration('Configure the soft hyphen character(s).')]
    public function setSoftHyphen(string $softHyphen): self
    {
        $this->softHyphen = $softHyphen;
        return $this;
    }
}
