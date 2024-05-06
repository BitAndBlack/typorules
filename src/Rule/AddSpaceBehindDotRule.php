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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBehindDotRuleTest
 */
#[Description(
    'Add a missing space behind a dot `.`.'
)]
#[TransformationExample(
    'Ganz am Ende.Wie geht\'s weiter.',
    "Ganz am Ende. Wie geht's weiter.",
)]
class AddSpaceBehindDotRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '. ';

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(?<!^\d)(?<!\s\d)\.(?!' . CharactersEnum::ALL_SPACES->value . ')(?!$)/';
    }
}
