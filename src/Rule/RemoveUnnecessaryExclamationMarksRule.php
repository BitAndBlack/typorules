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

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveUnnecessaryExclamationMarksRuleTest
 */
class RemoveUnnecessaryExclamationMarksRule extends AbstractRule implements RuleInterface
{
    private int $maxCountExclamationMark;

    public function __construct()
    {
        $this->maxCountExclamationMark = 2;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/\!{' . ($this->maxCountExclamationMark + 1) . ',}/';
    }

    public function getReplacePattern(): string
    {
        return str_repeat('!', $this->maxCountExclamationMark);
    }

    public function setMaxCountExclamationMark(int $maxCountExclamationMark): self
    {
        $this->maxCountExclamationMark = $maxCountExclamationMark;
        return $this;
    }
}
