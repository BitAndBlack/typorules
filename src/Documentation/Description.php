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
 * The Description attribute can be used to describe a class and its meaning.
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Description
{
    /**
     * The Description attribute can be used to describe a class and its meaning.
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
