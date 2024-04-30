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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertDashToEnDashRuleTest
 */
class ConvertDashToEnDashRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\s\-\s/';

    protected string $replacePattern = ' {endash} ';
    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return str_replace('{endash}', CharactersEnum::NDASH->value, $this->replacePattern);
    }
}
