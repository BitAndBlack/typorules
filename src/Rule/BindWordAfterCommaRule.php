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
 * @see \BitAndBlack\TypoRules\Tests\Rules\BindWordAfterCommaRuleTest
 * @deprecated This class has been renamed. Please use {@see AddNonBreakingSpaceBehindWordAfterCommaRule} instead.
 * @see AddNonBreakingSpaceBehindWordAfterCommaRule
 * @todo Remove in v1.0.
 */
#[Description(
    'Replace a whitespace with a non-breaking space between a short word and its following word if the short word follows a comma `,`. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.'
)]
#[TransformationExample(
    'Glaube mir, es war so schön!',
    'Glaube mir, es\xC2\xA0war so schön!',
)]
class BindWordAfterCommaRule extends AddNonBreakingSpaceBehindWordAfterCommaRule implements RuleInterface
{
}
