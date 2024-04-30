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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBehindQuestionMarkRuleTest
 */
class AddSpaceBehindQuestionMarkRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/\?(?!\s|\?)(?!$)/';

    protected string $replacePattern = '? ';
}
