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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveLeadingZerosFromDotSeparatedDateRuleTest
 */
#[Description(
    'Remove unnecessary leading zeros from a dot separated date.'
)]
#[TransformationExample(
    '01.03.2025',
    '1.3.2025',
)]
#[TransformationExample(
    '01. 03. 2025',
    '1. 3. 2025',
)]
class RemoveLeadingZerosFromDotSeparatedDateRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '$1$2';

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/0?(\d\.[' . CharactersEnum::ALL_SPACES->value . ']*)0?(\d\.[' . CharactersEnum::ALL_SPACES->value . ']*(\d{4}|\d{2}))/';
    }
}
