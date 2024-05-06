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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertXToTimesBetweenNumbersRuleTest
 */
#[Description(
    'Convert a `x` character into a multiplication sign `×`, when a measurement has been recognised.'
)]
class ConvertXToTimesBetweenNumbersRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\d)([' . CharactersEnum::ALL_SPACES->value . ']*)(x|X)([' . CharactersEnum::ALL_SPACES->value . ']*)(\d)/';
    }

    public function getReplacePattern(): string
    {
        return '$1$2' . CharactersEnum::TIMES->value . '$4$5';
    }
}
