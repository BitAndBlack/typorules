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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertQuotesToDoubleLowerUpperRuleTest
 */
#[Description(
    'Convert opening and closing quotes to double quotes, starting bottom and ending top.'
)]
#[TransformationExample(
    'Besonders "wichtige" Information',
    'Besonders „wichtige“ Information',
)]
class ConvertQuotesToDoubleBottomTopRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(' . CharactersEnum::getAllQuotes() . ')([^' . CharactersEnum::getAllQuotes() . ']+)(' . CharactersEnum::getAllQuotes() . ')/';
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::BDQUO->value . '$2' . CharactersEnum::LDQUO->value;
    }
}
