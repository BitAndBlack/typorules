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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveUnnecessaryQuestionMarksRuleTest
 */
class RemoveUnnecessaryQuestionMarksRule extends AbstractRule implements RuleInterface
{
    private int $maxCountQuestionMark;

    public function __construct()
    {
        $this->maxCountQuestionMark = 2;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/\?{' . ($this->maxCountQuestionMark + 1) . ',}/';
    }

    public function getReplacePattern(): string
    {
        return str_repeat('?', $this->maxCountQuestionMark);
    }

    public function setMaxCountQuestionMark(int $maxCountQuestionMark): self
    {
        $this->maxCountQuestionMark = $maxCountQuestionMark;
        return $this;
    }
}
