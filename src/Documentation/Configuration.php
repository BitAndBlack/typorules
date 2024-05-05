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

#[Attribute(Attribute::TARGET_METHOD)]
class Configuration
{
    public function __construct(
        private readonly string $description,
    ) {
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
