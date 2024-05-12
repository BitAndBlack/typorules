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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveDuplicatedWhitespaceRuleTest
 */
#[Description(
    'Remove duplicated whitespace with a single space character.'
)]
#[TransformationExample(
    'Ganz am      Ende.',
    'Ganz am Ende.',
)]
class RemoveDuplicatedWhitespaceRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\s{2,}/';

    protected string $replacePattern = ' ';

    public static function create(): self
    {
        return new self();
    }
}
