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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBetweenBracketsRuleTest
 */
#[Description(
    'Add a hair space between brackets. The space will be added behind left (opening) brackets and before right (closing) brackets.'
)]
#[TransformationExample(
    'Es geht los (warum auch immer)!',
    'Es geht los (\xE2\x80\x8Awarum auch immer\xE2\x80\x8A)!',
)]
class AddSpaceBetweenBracketsRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/(?<=(\(|\[|\{))(?=[^ ])|(?<=[^ ])(?=(\)|\^]|\}))/';

    public static function create(): self
    {
        return new self();
    }

    public function getReplacePattern(): string
    {
        return CharactersEnum::HAIR_SPACE->value;
    }
}
