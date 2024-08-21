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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveSpaceBeforeQuestionMarkRuleTest
 */
#[Description(
    'Remove whitespace before a question mark.'
)]
#[TransformationExample(
    'Glaubst du ?',
    'Glaubst du?',
)]
class RemoveSpaceBeforeQuestionMarkRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '$1';

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/[' . CharactersEnum::ALL_SPACES->value . ']+(\?)/';
    }
}
