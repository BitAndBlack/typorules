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
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindWordAfterDotRuleTest
 */
class BindWordAfterDotRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    protected int $wordMaxLength;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE->value;
        $this->wordMaxLength = 3;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/\.\s(\w{0,' . $this->wordMaxLength . '})\s/';
    }

    public function getReplacePattern(): string
    {
        return '. $1' . $this->nonBreakingSpace;
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
}
