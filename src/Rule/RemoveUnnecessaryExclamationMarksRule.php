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

use BitAndBlack\TypoRules\Documentation\Configuration;
use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveUnnecessaryExclamationMarksRuleTest
 */
#[Description(
    'Remove duplicated exclamation marks.'
)]
#[TransformationExample(
    'Nein! Nein!! Nein!!! Nein!!!!',
    'Nein! Nein!! Nein!! Nein!!',
)]
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

    #[Configuration('Configure the maximum permitted number of exclamation marks. This is `2` by default.')]
    public function setMaxCountExclamationMark(int $maxCountExclamationMark): self
    {
        $this->maxCountExclamationMark = $maxCountExclamationMark;
        return $this;
    }
}
