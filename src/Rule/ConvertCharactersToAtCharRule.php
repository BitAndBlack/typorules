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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToAtCharRuleTest
 */
class ConvertCharactersToAtCharRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\(at\)/';

    public function getReplacePattern(): string
    {
        return CharactersEnum::AT->value;
    }
}
