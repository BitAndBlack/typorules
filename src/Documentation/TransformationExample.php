<?php

namespace BitAndBlack\TypoRules\Documentation;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class TransformationExample
{
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
