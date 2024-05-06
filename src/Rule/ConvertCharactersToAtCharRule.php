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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToAtCharRuleTest
 */
#[Description(
    'Convert the characters `(at)` into an `@` character.'
)]
#[TransformationExample(
    'me(at)example.org',
    'me@example.org',
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
