<?php

declare(strict_types=1);

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Util;

/**
 * @internal
 */
class StringHelper
{
    public static function doesStringContainHtml(string $input): bool
    {
        return 0 !== preg_match('/(?<!\w)<\/?[a-zA-Z][a-zA-Z0-9]*(?=[ \/>])[^>]*>/', $input);
    }
}
