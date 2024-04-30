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
     * @return string
     */
    public function getSearchPattern(): string
    {
        return $this->searchPattern;
    }

    /**
     * @return string
     */
    public function getReplacePattern(): string
    {
        return $this->replacePattern;
    }

    /**
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
