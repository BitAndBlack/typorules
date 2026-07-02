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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveWhitespaceBeforeClosingQuoteRuleTest
 */
#[Description(
    'Remove whitespace before a closing quote.'
)]
#[TransformationExample(
    'Besonders „wichtige “ Information',
    'Besonders „wichtige“ Information',
)]
class RemoveWhitespaceBeforeClosingQuoteRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(' . CharactersEnum::getAllQuotesRegex() . ')([^' . CharactersEnum::getAllQuotesRegex() . ']+)(?:' . CharactersEnum::getAllSpacesRegex() . ')+(' . CharactersEnum::getAllQuotesRegex() . ')($|' . CharactersEnum::getAllSpacesRegex() . '|\)|\]|[.,;:!?])/u';
    }

    public function getReplacePattern(): string
    {
        return '$1$2$3$4';
    }
}
