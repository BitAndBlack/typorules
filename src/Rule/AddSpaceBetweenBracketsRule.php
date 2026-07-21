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
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSpaceBetweenBracketsRuleTest
 */
#[Description(
    'Add a non-breaking hair space between brackets. The space will be added behind left (opening) brackets and before right (closing) brackets.'
)]
#[TransformationExample(
    'Es geht los (warum auch immer)!',
    'Es geht los (\xE2\x80\x8Awarum auch immer\xE2\x80\x8A)!',
)]
class AddSpaceBetweenBracketsRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/(?<=(\(|\[|\{))(?=[^ ])|(?<=[^ \.\,\-])(?=(\)|\^]|\}))/';

    protected string $space;

    public function __construct()
    {
        $this->preferUtf8OverHtmlCharacters();
    }

    public static function create(): self
    {
        return new self();
    }

    public function preferHtmlOverUtf8Characters(): self
    {
        return $this->setSpace(
            CharactersEnum::NON_BREAKING_HAIR_SPACE_HTML->value,
        );
    }

    public function preferUtf8OverHtmlCharacters(): self
    {
        return $this->setSpace(
            CharactersEnum::NON_BREAKING_HAIR_SPACE_UTF8->value,
        );
    }

    public function getReplacePattern(): string
    {
        return $this->space;
    }

    #[Configuration('Configure the space character(s).')]
    public function setSpace(string $space): self
    {
        $this->space = $space;
        return $this;
    }
}
