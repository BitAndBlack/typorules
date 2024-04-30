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

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddHyphenBetweenDashSeparatedWordsRuleTest
 */
class AddSoftHyphenBetweenDashSeparatedWordsRule extends AbstractRule implements RuleInterface
{
    protected int $minLengthWordBefore = 3;

    protected int $minLengthWordAfter = 3;

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
