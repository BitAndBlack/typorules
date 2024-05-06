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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToAtCharRuleTest
 */
#[Description(
    'Convert the characters `(at)` into an `@` character.'
)]
class ConvertCharactersToAtCharRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\(at\)/';

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::AT->value;
    }
}
