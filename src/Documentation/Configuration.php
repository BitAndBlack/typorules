<?php

namespace BitAndBlack\TypoRules\Documentation;

use Attribute;

#[Attribute]
class Configuration
{
    public function __construct(private readonly string $description)
    {
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
