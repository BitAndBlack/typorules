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
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindNumberToNumberRuleTest
 */
#[Description(
    'Add a thin non breaking space between the words `Nr.` or `Nummer` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'Das ist Nr. 8.',
    "Das ist Nr.\xE2\x80\xAF8.",
)]
#[TransformationExample(
    'Das ist Nummer 8.',
    "Das ist Nummer\xE2\x80\xAF8.",
)]
class BindNumberToNumberRule extends AbstractRule implements RuleInterface
{
    public function getSearchPattern(): string
    {
        return '/(Nr\.|Nummer)[' . CharactersEnum::ALL_SPACES->value . '](\d)/';
    }

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return '$1' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '$2';
    }
}
