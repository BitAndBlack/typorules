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

use BitAndBlack\TypoRules\Documentation\Configuration;
use BitAndBlack\TypoRules\Documentation\Description;

/**
 * This class doesn't contain a predefined rule per default.
 * You can use it to define your custom search and replace patterns by your own.
 */
#[Description(
    <<<'DESCRIPTION'
    An empty rule that can be configured completely by yourself. It allows you to define your own patterns using the two setter methods and stay in the spirit of this library:
    
    ```php
    $customRule = new CustomRule();
    $customRule
        ->setSearchPattern('\s+/')
        ->setReplacePattern('\s')
    ;
    ```
    DESCRIPTION
)]
class CustomRule extends AbstractRule implements RuleInterface
{
    public static function create(): self
    {
        return new self();
    }

    /**
     * Defines the search pattern.
     *
     * @param string $searchPattern
     * @return $this
     */
    #[Configuration('Define the search pattern.')]
    public function setSearchPattern(string $searchPattern): self
    {
        $this->searchPattern = $searchPattern;
        return $this;
    }

    /**
     * Defines the replacement pattern.
     *
     * @param string $replacePattern
     * @return $this
     */
    #[Configuration('Define the replacement pattern.')]
    public function setReplacePattern(string $replacePattern): self
    {
        $this->replacePattern = $replacePattern;
        return $this;
    }
}
