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

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveDuplicatedWhitespaceRuleTest
 */
class RemoveDuplicatedWhitespaceRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\s{2,}/';

    protected string $replacePattern = ' ';

    public static function create(): self
    {
        return new self();
    }
}
