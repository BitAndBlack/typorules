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
     * `&commat;`
     */
    case AT = '@';

    /**
     * `&bdquo;` or `&#8222`;
     */
    case BDQUO = '„';

    /**
     * `&copy;`
     */
    case COPY = '©';

    /**
     * `&#160;`
     */
    case ELLIPSIS = '…';

    /**
     * @see CharactersEnum::HAIR_SPACE_HTML
     */
    case HAIR_SPACE_UTF8 = "\xE2\x80\x8A";

    /**
     * @see CharactersEnum::HAIR_SPACE_UTF8
     */
    case HAIR_SPACE_HTML = '&#8202;';

    /**
     * `&laquo;`
     */
    case LEFT_ANGLE_QUOTE = '«';

    /**
     * `&lsaquo;`
     */
    case LEFT_ANGLE_QUOTE_SINGLE = '‹';

    /**
     * `&ldquo;` or `&#8220;`
     */
    case LDQUO = '“';

    /**
     * `&rdquo;` or `&#8221;`
     */
    case RDQUO = '”';

    /**
     * `&mdash;` or `&#x2014;`
     */
    case MDASH = '—';

    /**
     * `&ndash;` or `&#x2013;`
     */
    case NDASH = '–';

    /**
     * @see CharactersEnum::NON_BREAKING_SPACE_THIN_HTML
     */
    case NON_BREAKING_SPACE_THIN_UTF8 = "\xE2\x80\xAF";

    /**
     * @see CharactersEnum::NON_BREAKING_SPACE_THIN_UTF8
     */
    case NON_BREAKING_SPACE_THIN_HTML = '&#8239;';

    /**
     * @see CharactersEnum::NON_BREAKING_SPACE_HTML
     */
    case NON_BREAKING_SPACE_UTF8 = "\xC2\xA0";

    /**
     * @see CharactersEnum::NON_BREAKING_SPACE_UTF8
     */
    case NON_BREAKING_SPACE_HTML = '&nbsp;';

    /**
     * `&raquo;`
     */
    case RIGHT_ANGLE_QUOTE = '»';

    /**
     * `&rsaquo;`
     */
    case RIGHT_ANGLE_QUOTE_SINGLE = '›';

    /**
     * `&reg;`
     */
    case REGISTERED = '®';

    /**
     * `&lsquo;`
     */
    case LSQUO = '‘';

    /**
     * `&rsquo;`
     */
    case RSQUO = '’';

    /**
     * @see CharactersEnum::SOFT_HYPHEN_HTML
     */
    case SOFT_HYPHEN_UTF8 = "\xC2\xAD";

    /**
     * @see CharactersEnum::SOFT_HYPHEN_UTF8
     */
    case SOFT_HYPHEN_HTML = '&shy;';

    /**
     * `&times;`
     */
    case TIMES = '×';

    /**
     * `&trade;`
     */
    case TRADEMARK = '™';

    /**
     * `&sbquo;`
     */
    case SBQUO = '‚';

    /**
     * Returns all kinds of quotes as regex string.
     */
    public static function getAllQuotesRegex(): string
    {
        return self::getContentForRegex(
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
        );
    }

    /**
     * Returns all kinds of spaces as regex string.
     */
    public static function getAllSpacesRegex(): string
    {
        return self::getContentForRegex(
            self::NON_BREAKING_SPACE_THIN_UTF8->value,
            self::SOFT_HYPHEN_UTF8->value,
            self::NON_BREAKING_SPACE_UTF8->value,
            '\s',
        );
    }

    /**
     * @param string ...$content
     * @return string
     */
    private static function getContentForRegex(string ...$content): string
    {
        return implode(
            '|',
            $content
        );
    }
}
