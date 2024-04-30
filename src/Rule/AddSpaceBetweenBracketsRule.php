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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBetweenBracketsRuleTest
 * @todo Use smaller space
 */
class AddSpaceBetweenBracketsRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/(?<=(\(|\[|\{))(?=[^ ])|(?<=[^ ])(?=(\)|\^]|\}))/';

    public function getReplacePattern(): string
    {
        return CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }
}
