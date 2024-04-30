<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Exception;

use BitAndBlack\TypoRules\Exception;

class MissingDependencyException extends Exception
{
    /**
     * @param class-string $classSource
     * @param class-string $classMissing
     */
    public function __construct(string $classSource, string $classMissing)
    {
        parent::__construct(
            'Cannot use class "' . $classSource . '", as it requires class "' . $classMissing . '", which is currently missing. Make sure to install this additional dependency.'
        );
    }
}
