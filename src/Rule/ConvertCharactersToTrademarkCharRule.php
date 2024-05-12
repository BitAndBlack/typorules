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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToTrademarkCharRuleTest
 */
#[Description(
    'Convert the characters `(tm)` or `(TM)` into an `™` character.'
)]
#[TransformationExample(
    'Star Wars(tm)',
    'Star Wars™',
)]
class ConvertCharactersToTrademarkCharRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\((t|T)(m|M)\)/';

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::TRADEMARK->value;
    }
}
