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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToRegisteredCharRuleTest
 */
class ConvertCharactersToRegisteredCharRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\((r|R)\)/';

    public function getReplacePattern(): string
    {
        return CharactersEnum::REGISTERED->value;
    }
}
