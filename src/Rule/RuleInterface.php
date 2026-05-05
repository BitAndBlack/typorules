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

namespace BitAndBlack\TypoRules\Rule;

use BitAndBlack\TypoRules\Violation;

interface RuleInterface
{
    public static function create(): self;

    /**
     * Returns a list of all violations in the given input.
     *
     * @return array<int, Violation>
     */
    public function getViolations(string $content): array;

    /**
     * Returns the search pattern for this rule.
     */
    public function getSearchPattern(): string;

    /**
     * Returns the replacement pattern for this rule.
     */
    public function getReplacePattern(): string;

    /**
     * Returns the fixed input content.
     */
    public function getContentFixed(string $content): string;
}
