<?php

namespace BitAndBlack\TypoRules\Documentation;

use Attribute;

#[Attribute]
class Description
{
    public function __construct(private readonly string $description)
    {
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
