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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNumberAndJahrhundertRuleTest
 */
#[Description(
    'Add a non-breaking space between a number (ending with a dot) and the following word `Jahrhundert` to disallow separating them from each other. '
    . '*Attention*: This rule may also find numbers at the end of a sentence, where the new sentence starts with the word `Jahrhundert`. It should only be used manually.'
)]
#[TransformationExample(
    'Im 18. Jahrhundert',
    'Im 18.\xC2\xA0Jahrhundert',
)]
class AddNonBreakingSpaceBetweenNumberAndJahrhundertRule extends AbstractRule implements RuleInterface
{
    public function getSearchPattern(): string
    {
        return '/(?<=\d\.)[' . CharactersEnum::ALL_SPACES->value . ']*(?=Jahrhundert)/';
    }

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::NON_BREAKING_SPACE->value;
    }
}
