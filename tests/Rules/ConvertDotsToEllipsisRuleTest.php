<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\Rules;

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Rule\ConvertDotsToEllipsisRule;
use Generator;

class ConvertDotsToEllipsisRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return ConvertDotsToEllipsisRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Ich weiß nicht...',
            'Ich weiß nicht' . CharactersEnum::ELLIPSIS->value,
            '... weiß nicht...',
        ];

        yield [
            'Was ...wenn nicht?',
            'Was ' . CharactersEnum::ELLIPSIS->value . 'wenn nicht?',
            'Was ...wenn nicht?',
        ];

        yield [
            'Aha.........?',
            'Aha' . CharactersEnum::ELLIPSIS->value . '?',
            'Aha.........?',
        ];

        yield [
            'Du weißt nicht. . .',
            'Du weißt nicht' . CharactersEnum::ELLIPSIS->value,
            '...weißt nicht. . .',
        ];

        yield [
            'Du weißt nicht. . . ',
            'Du weißt nicht' . CharactersEnum::ELLIPSIS->value . ' ',
            '...weißt nicht. . . ',
        ];
    }
}
