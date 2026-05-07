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

namespace BitAndBlack\TypoRules;

enum CharactersEnum: string
{
    /**
     * All supported spaces, used in regexps. Better than \s
     */
    case ALL_SPACES = "\xE2\x80\xAF|\xC2\xAD|\xC2\xA0|\\s";

    /**
     * &commat;
     */
    case AT = '@';

    /**
     * &bdquo; or &#8222;
     */
    case BDQUO = '„';

    /**
     * &copy;
     */
    case COPY = '©';

    /**
     * &#160;
     */
    case ELLIPSIS = '…';

    /**
     * &#8202;
     */
    case HAIR_SPACE = "\xE2\x80\x8A";

    /**
     * &laquo;
     */
    case LEFT_ANGLE_QUOTE = '«';

    /**
     * &lsaquo;
     */
    case LEFT_ANGLE_QUOTE_SINGLE = '‹';

    /**
     * &ldquo; or &#8220;
     */
    case LDQUO = '“';

    /**
     * &rdquo; or &#8221;
     */
    case RDQUO = '”';

    /**
     * &mdash; or &#x2014;
     */
    case MDASH = '—';

    /**
     * &ndash; or &#x2013;
     */
    case NDASH = '–';

    /**
     * &#8239;
     */
    case NON_BREAKING_SPACE_THIN = "\xE2\x80\xAF";

    /**
     * &nbsp;
     */
    case NON_BREAKING_SPACE = "\xC2\xA0";

    /**
     * &raquo;
     */
    case RIGHT_ANGLE_QUOTE = '»';

    /**
     * &rsaquo;
     */
    case RIGHT_ANGLE_QUOTE_SINGLE = '›';

    /**
     * &reg;
     */
    case REGISTERED = '®';

    /**
     * &lsquo;
     */
    case LSQUO = '‘';

    /**
     * &rsquo;
     */
    case RSQUO = '’';

    /**
     * &shy;
     */
    case SOFT_HYPHEN = "\xC2\xAD";

    /**
     * &times;
     */
    case TIMES = '×';

    /**
     * &trade;
     */
    case TRADEMARK = '™';

    /**
     * &sbquo;
     */
    case SBQUO = '‚';

    public static function getAllQuotes(): string
    {
        $quotes = [
            '"',
            self::BDQUO->value,
            self::SBQUO->value,
            self::LEFT_ANGLE_QUOTE->value,
            self::LEFT_ANGLE_QUOTE_SINGLE->value,
            self::RIGHT_ANGLE_QUOTE->value,
            self::RIGHT_ANGLE_QUOTE_SINGLE->value,
            self::LDQUO->value,
            self::LSQUO->value,
            self::RDQUO->value,
            self::RSQUO->value,
        ];

        return implode(
            '|',
            $quotes
        );
    }
}
