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

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindNumberToNumberRuleTest
 */
class BindNumberToNumberRule extends AbstractRule implements RuleInterface
{
    public function getSearchPattern(): string
    {
        return '/(Nr\.|Nummer)[' . CharactersEnum::ALL_SPACES->value . '](\d)/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . CharactersEnum::NON_BREAKING_SPACE_THIN->value . '$2';
    }
}
