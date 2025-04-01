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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNummerAndNumberRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `Nr.` or `Number` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'This is no. 8.',
    'This is no.\xE2\x80\xAF8.',
)]
#[TransformationExample(
    'This is number 8.',
    'This is number\xE2\x80\xAF8.',
)]
#[TransformationExample(
    '№ 8.',
    '№\xE2\x80\xAF8.',
)]
class AddNonBreakingSpaceBetweenWordNumberAndNumberRule extends AbstractRule implements RuleInterface
{
    public function getSearchPattern(): string
    {
        return '/(?<=[Nn]o\.|[Nn]umber|№)[' . CharactersEnum::ALL_SPACES->value . ']*(?=\d)/';
    }

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }
}
