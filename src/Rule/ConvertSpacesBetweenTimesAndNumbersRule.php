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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertSpacesBetweenTimesAndNumbersRuleTest
 */
#[Description(
    'Recognises a measurement and inserts thin non-breaking spaces before and after the multiplication mark `x` or `×`.'
)]
#[TransformationExample(
    'Format: 15 x 9 cm.',
    'Format: 15\xE2\x80\xAFx\xE2\x80\xAF9 cm.',
)]
#[TransformationExample(
    'Format: 15 × 9 cm.',
    'Format: 15\xE2\x80\xAF×\xE2\x80\xAF9 cm.',
)]
class ConvertSpacesBetweenTimesAndNumbersRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\d)([' . CharactersEnum::ALL_SPACES->value . ']*)(' . CharactersEnum::TIMES->value . '|x|X)([' . CharactersEnum::ALL_SPACES->value . ']*)(\d)/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '$3' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '$5';
    }
}
