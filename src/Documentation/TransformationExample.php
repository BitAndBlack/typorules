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
 * The TransformationExample attribute can be used to describe a transformation
 * a class can make.
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class TransformationExample
{
    /**
     * The TransformationExample attribute can be used to describe a transformation
     * a class can make.
     */
    public function __construct(
        private readonly string $before,
        private readonly string $after,
        private readonly ?string $description = null,
    ) {
    }

    public function getBefore(): string
    {
        return $this->before;
    }

    public function getAfter(): string
    {
        return $this->after;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
