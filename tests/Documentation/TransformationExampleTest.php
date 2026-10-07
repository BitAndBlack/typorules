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

namespace BitAndBlack\TypoRules\Tests\Documentation;

use BitAndBlack\TypoRules\Documentation\TransformationExample;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterDoctorRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterProfessorRule;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBeforeSemicolonRule;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * The documented transformation examples are part of the public documentation,
 * therefore they must be correct.
 */
final class TransformationExampleTest extends TestCase
{
    /**
     * @return array<int, class-string>
     */
    private function getRuleClasses(): array
    {
        $files = glob(__DIR__ . '/../../src/Rule/*.php');
        $ruleClasses = [];

        if (false === $files) {
            return [];
        }

        foreach ($files as $file) {
            $ruleClass = 'BitAndBlack\\TypoRules\\Rule\\' . basename($file, '.php');

            if (true === class_exists($ruleClass)) {
                $ruleClasses[] = $ruleClass;
            }
        }

        return $ruleClasses;
    }

    /**
     * @param class-string $ruleClass
     * @return array<int, TransformationExample>
     */
    private function getTransformationExamples(string $ruleClass): array
    {
        $examples = [];

        foreach ((new ReflectionClass($ruleClass))->getAttributes(TransformationExample::class) as $attribute) {
            $examples[] = $attribute->newInstance();
        }

        return $examples;
    }

    private function decodeHexEscapes(string $value): string
    {
        return (string) preg_replace_callback(
            '/\\\\x([0-9a-fA-F]{2})/',
            static function (array $matches): string {
                $decodedByte = hex2bin($matches[1]);

                return false === $decodedByte ? $matches[0] : $decodedByte;
            },
            $value
        );
    }

    public function testDocumentedExamplesAreValidUtf8(): void
    {
        foreach ($this->getRuleClasses() as $ruleClass) {
            foreach ($this->getTransformationExamples($ruleClass) as $example) {
                foreach ([
                    'before' => $example->getBefore(),
                    'after' => $example->getAfter(),
                ] as $position => $documentedValue) {
                    $decodedValue = $this->decodeHexEscapes($documentedValue);

                    self::assertTrue(
                        mb_check_encoding($decodedValue, 'UTF-8'),
                        $ruleClass . ': The ' . $position . ' of the documented example `' . $documentedValue . '` is not valid UTF-8.'
                    );
                }
            }
        }
    }

    public function testSemicolonRuleExamplesContainASemicolon(): void
    {
        $examples = $this->getTransformationExamples(AddNonBreakingSpaceBeforeSemicolonRule::class);

        self::assertNotEmpty($examples);

        foreach ($examples as $example) {
            self::assertStringContainsString(
                ';',
                $example->getBefore(),
                'The documented example of ' . AddNonBreakingSpaceBeforeSemicolonRule::class . ' must contain a semicolon.'
            );

            self::assertStringContainsString(
                ';',
                $example->getAfter(),
                'The documented example of ' . AddNonBreakingSpaceBeforeSemicolonRule::class . ' must contain a semicolon.'
            );
        }
    }

    public function testHtmlExamplesOfThinSpaceUseTheThinSpaceEntity(): void
    {
        foreach ([AddNonBreakingSpaceAfterDoctorRule::class, AddNonBreakingSpaceAfterProfessorRule::class] as $ruleClass) {
            foreach ($this->getTransformationExamples($ruleClass) as $example) {
                $description = $example->getDescription() ?? '';

                if (false === str_contains($description, 'HTML')) {
                    continue;
                }

                self::assertStringContainsString(
                    '&#8239;',
                    $example->getAfter(),
                    'The HTML example of ' . $ruleClass . ' must use the thin non-breaking space entity.'
                );

                self::assertStringNotContainsString(
                    '&nbsp;',
                    $example->getAfter(),
                    'The HTML example of ' . $ruleClass . ' must not use the regular non-breaking space entity.'
                );
            }
        }
    }
}
