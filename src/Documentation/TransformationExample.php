<?php

namespace BitAndBlack\TypoRules\Documentation;

use Attribute;

#[Attribute]
class TransformationExample
{
    public function __construct(private readonly string $before, private readonly string $after)
    {
    }

    public function getAfter(): string
    {
        return $this->after;
    }

    public function getBefore(): string
    {
        return $this->before;
    }
}
