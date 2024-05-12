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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertCharactersToCopyrightCharRuleTest
 */
#[Description(
    'Convert the characters `(c)` or `(C)` into an `©` character.'
)]
#[TransformationExample(
    '(c) Bit&Black',
    '© Bit&Black',
)]
class ConvertCharactersToCopyrightCharRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/\((' . CharactersEnum::ALL_SPACES->value . ')*(c|C)(' . CharactersEnum::ALL_SPACES->value . ')*\)/';
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::COPY->value;
    }
}
