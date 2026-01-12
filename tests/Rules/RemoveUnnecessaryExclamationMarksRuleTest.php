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

use BitAndBlack\TypoRules\Rule\RemoveUnnecessaryExclamationMarksRule;
use Generator;

final class RemoveUnnecessaryExclamationMarksRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveUnnecessaryExclamationMarksRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Nein! Nein!! Nein!!! Niemals!Nicht!!!!',
            'Nein! Nein!! Nein!! Niemals!Nicht!!',
            '... Nein!! Nein!!! Niemals!Nic...',
        ];
    }
}
