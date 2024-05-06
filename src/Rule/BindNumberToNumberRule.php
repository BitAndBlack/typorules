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

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindNumberToNumberRuleTest
 */
#[Description(
    'Add a thin non breaking space between the words `Nr.` or `Nummer` and a following number to disallow separating them from each other.'
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
