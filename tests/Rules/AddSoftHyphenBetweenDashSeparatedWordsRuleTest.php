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
use BitAndBlack\TypoRules\Rule\AddSoftHyphenBetweenDashSeparatedWordsRule;
use Generator;

final class AddSoftHyphenBetweenDashSeparatedWordsRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSoftHyphenBetweenDashSeparatedWordsRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Mit 250 km/h',
            'Mit 250 km/h',
            null,
        ];

        yield [
            'Von Paris/Frankreich nach Stuttgart/Deutschland.',
            'Von Paris/' . CharactersEnum::SOFT_HYPHEN->value . 'Frankreich nach Stuttgart/' . CharactersEnum::SOFT_HYPHEN->value . 'Deutschland.',
            'Von Paris/Frankreich nach Stuttgart/Deut...',
        ];

        yield [
            'Heute / morgen?',
            'Heute / morgen?',
            null,
        ];
    }
}
