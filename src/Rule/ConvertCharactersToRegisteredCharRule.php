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
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToRegisteredCharRuleTest
 */
#[Description(
    'Convert the characters `(r)` or `(R)` into an `®` character.'
)]
#[TransformationExample(
    'Apple(r)',
    'Apple®',
)]
class ConvertCharactersToRegisteredCharRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\((r|R)\)/';

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::REGISTERED->value;
    }
}
