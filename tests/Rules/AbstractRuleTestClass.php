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

use BitAndBlack\TypoRules\Rule\RuleInterface;
use Generator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class AbstractRuleTestClass extends TestCase
{
    #[DataProvider('getTestRuleData')]
    public function testRule(string $input, string $outputExpected, string|null $violatedPartExpected): void
    {
        $baseTestClass = $this->getBaseTestClass();

        $ruleClass = new $baseTestClass();
        $violations = $ruleClass->getViolations($input);

        if (null !== $violatedPartExpected) {
            self::assertNotEmpty(
                $violations,
                'Expected violation but got none. (Pattern was `' . $ruleClass->getSearchPattern() . '`.)'
            );

            $violation = $violations[0];

            self::assertSame(
                $violatedPartExpected,
                $violation->getViolationPreview(),
                'The violation preview is not the expected one.'
            );

            self::assertSame(
                $outputExpected,
                $violation->getContentFixed(),
                'The fixed violation is not the expected one.'
            );
        }

        if (null === $violatedPartExpected) {
            self::assertEmpty(
                $violations,
                'Expected no violation but got one.'
            );
        }
    }

    abstract public static function getTestRuleData(): Generator;

    /**
     * Returns the class string of the rule that should be tested.
     *
     * @return class-string<RuleInterface>
     */
    abstract public function getBaseTestClass(): string;
}
