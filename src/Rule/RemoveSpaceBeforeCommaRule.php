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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveSpaceBeforeCommaRuleTest
 */
class RemoveSpaceBeforeCommaRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '$1 ';

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/[' . CharactersEnum::ALL_SPACES->value . ']+(,)[' . CharactersEnum::ALL_SPACES->value . ']*/';
    }
}
