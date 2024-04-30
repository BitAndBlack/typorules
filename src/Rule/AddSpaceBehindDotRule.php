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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBehindDotRuleTest
 */
class AddSpaceBehindDotRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '. ';

    public function getSearchPattern(): string
    {
        return '/(?<!^\d)(?<!\s\d)\.(?!' . CharactersEnum::ALL_SPACES->value . ')(?!$)/';
    }
}
