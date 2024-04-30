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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertSpacesBetweenTimesAndNumbersRuleTest
 */
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
