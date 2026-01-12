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

use BitAndBlack\TypoRules\Rule\RemoveWhitespaceAtBeginningRule;
use Generator;

final class RemoveWhitespaceAtBeginningRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveWhitespaceAtBeginningRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            ' Wir glauben, dass das Sinn macht',
            'Wir glauben, dass das Sinn macht',
            ' Wir glauben, dass das Si...',
        ];

        yield [
            'Ganz am Ende. ' . PHP_EOL . ' Wie geht\'s weiter?',
            'Ganz am Ende. ' . PHP_EOL . 'Wie geht\'s weiter?',
            '...z am Ende. ' . PHP_EOL . ' Wie geht\'s w...',
        ];
    }
}
