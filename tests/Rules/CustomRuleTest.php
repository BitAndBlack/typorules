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

use BitAndBlack\TypoRules\Rule\CustomRule;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CustomRuleTest extends TestCase
{
    public function testThrowsExceptionWhenReplacePatternIsNotConfigured(): void
    {
        $rule = CustomRule::create()
            ->setSearchPattern('/\s+/')
        ;

        $this->expectException(InvalidArgumentException::class);

        $rule->getContentFixed('a b');
    }

    public function testInvalidSearchPatternThrowsExceptionInsteadOfDroppingContent(): void
    {
        $rule = CustomRule::create()
            ->setSearchPattern('/[/')
            ->setReplacePattern('x')
        ;

        $this->expectException(InvalidArgumentException::class);

        $rule->getContentFixed('hello world');
    }
}
