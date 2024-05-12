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

use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBehindExclamationMarkRuleTest
 */
#[Description(
    'Add a missing space behind an exclamation mark `!`.'
)]
#[TransformationExample(
    'Ganz am Ende!Wie geht\'s weiter!',
    'Ganz am Ende! Wie geht\'s weiter!',
)]
class AddSpaceBehindExclamationMarkRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/!(?!\s|\!)(?!$)/';

    protected string $replacePattern = '! ';

    public static function create(): self
    {
        return new self();
    }
}
