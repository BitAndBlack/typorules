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
 * @see \BitAndBlack\TypoRules\Tests\Rules\RemoveUnnecessaryExclamationMarksRuleTest
 */
class RemoveUnnecessaryExclamationMarksRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\!{3,}/';

    protected string $replacePattern = '!!';
}
