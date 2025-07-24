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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceBetweenNumberAndNumberRule
 * @deprecated This class has been renamed. Please use {@see AddNonBreakingSpaceBetweenWordNummerAndNumberRule} instead.
 * @see AddNonBreakingSpaceBetweenWordNummerAndNumberRule
 * @todo Remove in v1.0.
 */
#[Description(
    'Add a thin non-breaking space between the words `Nr.` or `Nummer` and a following number to disallow separating them from each other.'
)]
#[TransformationExample(
    'Das ist Nr. 8.',
    'Das ist Nr.\xE2\x80\xAF8.',
)]
#[TransformationExample(
    'Das ist Nummer 8.',
    'Das ist Nummer\xE2\x80\xAF8.',
)]
class AddNonBreakingSpaceBetweenNumberAndNumberRule extends AddNonBreakingSpaceBetweenWordNummerAndNumberRule
{
}
