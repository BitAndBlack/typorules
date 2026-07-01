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

namespace BitAndBlack\TypoRules\Tests;

use BitAndBlack\TypoRules\Rule\AddSpaceBehindDotRule;
use BitAndBlack\TypoRules\Violation;
use PHPUnit\Framework\TestCase;

final class ViolationTest extends TestCase
{
    public function testViolationPreview(): void
    {
        $content = "Wir sind jetzt ganz am Ende.Wie geht's weiter? Und wann?";

        $violationPreviewExpected = "...ganz am Ende.Wie geht's w...";
        $violationPositionExpected = 27;
        $violatedPartExpected = '.';

        $rule = new AddSpaceBehindDotRule();

        $violation = new Violation(
            $rule,
            $content,
            $violationPositionExpected,
            $violatedPartExpected
        );

        self::assertSame(
            $violationPreviewExpected,
            $violation->getViolationPreview()
        );

        self::assertSame(
            $violationPositionExpected,
            $rule->getViolations($content)[0]->getViolationPosition()
        );

        self::assertSame(
            $violationPreviewExpected,
            $rule->getViolations($content)[0]->getViolationPreview()
        );
    }
}
