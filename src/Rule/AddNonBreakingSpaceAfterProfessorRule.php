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

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Documentation\Configuration;
use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddNonBreakingSpaceAfterProfessorRuleTest
 */
#[Description(
    'Add a non breaking space after `Prof.`. This binds the title and the name together and makes it *easier to read*.'
)]
#[TransformationExample(
    'Prof. Max Mustermann',
    'Prof.\xE2\x80\xAFMax Mustermann',
    'With a thin non breaking space (`\xE2\x80\xAF`)'
)]
#[TransformationExample(
    'Prof. Max Mustermann',
    'Prof.&nbsp;Max Mustermann',
    'With a non breaking space for html (`&nbsp;`)'
)]
class AddNonBreakingSpaceAfterProfessorRule extends AbstractRule implements RuleInterface
{
    protected string $nonBreakingSpace;

    public function __construct()
    {
        $this->nonBreakingSpace = CharactersEnum::NON_BREAKING_SPACE_THIN->value;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(Prof\.)(' . CharactersEnum::ALL_SPACES->value . ')+/';
    }

    public function getReplacePattern(): string
    {
        return '$1' . $this->nonBreakingSpace;
    }

    #[Configuration('Configure the type of the space. Per default, a thin non breaking space will be used.')]
    public function setNonBreakingSpace(string $nonBreakingSpace): self
    {
        $this->nonBreakingSpace = $nonBreakingSpace;
        return $this;
    }
}
