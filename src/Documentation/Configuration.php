<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Documentation;

use Attribute;

/**
 * The Configuration attribute can be used to describe a method,
 * that can be used to customize or configure the behaviour of a class.
 */
#[Attribute(Attribute::TARGET_METHOD)]
class Configuration
{
    /**
     * The Configuration attribute can be used to describe a method,
     * that can be used to customize or configure the behaviour of a class.
     *
     * @param string $description
     */
    public function __construct(
        private readonly string $description,
    ) {
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
