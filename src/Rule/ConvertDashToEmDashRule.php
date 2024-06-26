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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertDashToEmDashRuleTest
 */
#[Description(
    'Convert a dash `-` into an em dash `—` when there is whitespace before and after.'
)]
#[TransformationExample(
    'And if so - I don\'t think so!',
    'And if so — I don\'t think so!',
)]
class ConvertDashToEmDashRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\s\-\s/';

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return ' ' . CharactersEnum::MDASH->value . ' ';
    }
}
