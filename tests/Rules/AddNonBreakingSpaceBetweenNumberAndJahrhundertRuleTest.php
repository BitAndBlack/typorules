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

namespace BitAndBlack\TypoRules\Tests\Rules;

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenNumberAndJahrhundertRule;
use Generator;

final class AddNonBreakingSpaceBetweenNumberAndJahrhundertRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenNumberAndJahrhundertRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Im 18. Jahrhundert',
            'Im 18.' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahrhundert',
            'Im 18. Jahrhundert',
        ];

        yield [
            'Ende des 1. Jahrhunderts',
            'Ende des 1.' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahrhunderts',
            'Ende des 1. Jahrhunderts',
        ];
    }

    public function testCanHandleHtmlCharacters(): void
    {
        $rule = new AddNonBreakingSpaceBetweenNumberAndJahrhundertRule();
        $rule->setNonBreakingSpace('&nbsp;');

        self::assertSame(
            'Im 18.&nbsp;Jahrhundert',
            $rule->getContentFixed('Im 18. Jahrhundert')
        );
    }
}
