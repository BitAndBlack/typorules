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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveWhitespaceAfterOpeningQuoteRuleTest
 */
#[Description(
    'Remove whitespace after an opening quote.'
)]
#[TransformationExample(
    'Besonders „ wichtige“ Information',
    'Besonders „wichtige“ Information',
)]
class RemoveWhitespaceAfterOpeningQuoteRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(!^|' . CharactersEnum::ALL_SPACES->value . '|\()(' . CharactersEnum::getAllQuotes() . ')' . CharactersEnum::ALL_SPACES->value . '+([^' . CharactersEnum::getAllQuotes() . ']+)(' . CharactersEnum::getAllQuotes() . ')/';
    }

    public function getReplacePattern(): string
    {
        return '$1$2$3$4';
    }
}
