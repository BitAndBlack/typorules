<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Rule;

use BitAndBlack\TypoRules\Violation;

abstract class AbstractRule implements RuleInterface
{
    protected string $searchPattern;

    protected string $replacePattern;

    /**
     * Returns a list of all violations in the given input.
     *
     * @return array<int, Violation>
     */
    public function getViolations(string $content): array
    {
        $violations = [];

        preg_match_all(
            $this->getSearchPattern(),
            $content,
            $violationsFound,
            PREG_OFFSET_CAPTURE
        );

        foreach ($violationsFound[0] as $violation) {
            $violations[] = new Violation(
                $this,
                $content,
                $violation[1],
                $violation[0],
            );
        }

        return $violations;
    }

    /**
     * Returns the search pattern for this rule.
     *
     * @return string
     */
    public function getSearchPattern(): string
    {
        return $this->searchPattern;
    }

    /**
     * Returns the replacement pattern for this rule.
     *
     * @return string
     */
    public function getReplacePattern(): string
    {
        return $this->replacePattern;
    }

    /**
     * Returns the fixed input content.
     *
     * @return string
     */
    public function getContentFixed(string $content): string
    {
        return (string) preg_replace(
            $this->getSearchPattern(),
            $this->getReplacePattern(),
            $content
        );
    }
}
