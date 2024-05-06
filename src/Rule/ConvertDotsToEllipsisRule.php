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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertDotsToEllipsisRuleTest
 */
#[Description(
    'Convert three or more dots `...` into an ellipsis character `…`.'
)]
class ConvertDotsToEllipsisRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\.(\s?)){3,}/';
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::ELLIPSIS->value . '$2';
    }
}
