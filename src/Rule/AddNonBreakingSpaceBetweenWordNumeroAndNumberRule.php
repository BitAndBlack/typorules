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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNumeroAndNumberRuleTest
 */
#[Description(
    'Add a thin non-breaking space between the words `n°` or `numéro` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'C\'est le n° 8.',
    'C\'est le n°\xE2\x80\xAF8.',
)]
#[TransformationExample(
    'C\'est le numéro 8.',
    'C\'est le numéro\xE2\x80\xAF8.',
)]
#[TransformationExample(
    'N°8',
    'N°\xE2\x80\xAF8',
)]
class AddNonBreakingSpaceBetweenWordNumeroAndNumberRule extends AbstractRule implements RuleInterface
{
    public function getSearchPattern(): string
    {
        return '/(?<=[Nn]°|[Nn]uméro)[' . CharactersEnum::ALL_SPACES->value . ']*(?=\d)/';
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
