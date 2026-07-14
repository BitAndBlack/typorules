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
 * @see \BitAndBlack\TypoRules\Tests\Rules\ConvertQuotesToGuillemetFacingOutwardsRuleTest
 */
#[Description(
    'Convert opening and closing quotes to Guillemets, facing outwards.'
)]
#[TransformationExample(
    'Information particulièrement "importante"',
    'Information particulièrement «importante»',
)]
class ConvertQuotesToGuillemetFacingOutwardsRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(' . CharactersEnum::getAllQuotesRegex() . ')([^' . CharactersEnum::getAllQuotesRegex() . ']+)(' . CharactersEnum::getAllQuotesRegex() . ')/';
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::LEFT_ANGLE_QUOTE->value . '$2' . CharactersEnum::RIGHT_ANGLE_QUOTE->value;
    }
}
