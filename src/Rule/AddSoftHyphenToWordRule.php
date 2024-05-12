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

use BitAndBlack\Composer\Composer;
use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Documentation\Configuration;
use BitAndBlack\TypoRules\Documentation\Description;
use BitAndBlack\TypoRules\Documentation\TransformationExample;
use BitAndBlack\TypoRules\Exception\MissingDependencyException;
use Org\Heigl\Hyphenator\Hyphenator;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSoftHyphenToWordRuleTest
 */
#[Description(
    'Add a soft hyphen to words to allow hyphenation. This can make the typeface appear calmer and leads to better utilisation of the available type width.'
)]
#[TransformationExample(
    'Bodensee',
    'Boden\xC2\xADsee',
)]
class AddSoftHyphenToWordRule extends AbstractRule implements RuleInterface
{
    protected string $replacePattern = '$1';

    protected ?string $languageCode = null;

    protected string $hyphen;

    protected int $minCharacterCountBefore;

    protected int $minCharacterCountAfter;

    protected int $minWordCharacterCount;

    /**
     * @throws MissingDependencyException
     */
    public function __construct()
    {
        if (false === Composer::classExists(Hyphenator::class)) {
            throw new MissingDependencyException(
                static::class,
                Hyphenator::class
            );
        }

        $this->hyphen = CharactersEnum::SOFT_HYPHEN->value;
        $this->minCharacterCountBefore = 5;
        $this->minCharacterCountAfter = 5;
        $this->minWordCharacterCount = $this->minCharacterCountBefore + $this->minCharacterCountAfter;
    }

    public static function create(): self
    {
        return new self();
    }

    public function getSearchPattern(): string
    {
        return '/(\w{' . $this->minWordCharacterCount . ',})/';
    }

    #[Configuration('Define the language code.')]
    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    #[Configuration('Define the hyphenation character.')]
    public function setHyphen(string $hyphen): self
    {
        $this->hyphen = $hyphen;
        return $this;
    }

    #[Configuration('Define, how many characters a word must have before the first hyphen may appear.')]
    public function setMinCharacterCountBefore(int $minCharacterCountBefore): self
    {
        $this->minCharacterCountBefore = $minCharacterCountBefore;
        return $this;
    }

    #[Configuration('Define, how many characters a word must have after the last hyphen.')]
    public function setMinCharacterCountAfter(int $minCharacterCountAfter): self
    {
        $this->minCharacterCountAfter = $minCharacterCountAfter;
        return $this;
    }

    #[Configuration('Define the minimum length a word must have to be hyphenated.')]
    public function setMinWordCharacterCount(int $minWordCharacterCount): self
    {
        $this->minWordCharacterCount = $minWordCharacterCount;
        return $this;
    }

    public function getContentFixed(string $content): string
    {
        $hyphenator = Hyphenator::factory(null, $this->languageCode);

        $options = $hyphenator->getOptions();
        $options
            ->setHyphen($this->hyphen)
            ->setLeftMin($this->minCharacterCountBefore)
            ->setRightMin($this->minCharacterCountAfter)
            ->setMinWordLength($this->minWordCharacterCount)
        ;

        $replacement = static function ($match) use ($hyphenator): string {
            $word = $match[0];
            $wordHyphenated = $hyphenator->hyphenate($word);

            if (!is_string($wordHyphenated)) {
                return $word;
            }

            return $wordHyphenated;
        };

        return (string) preg_replace_callback(
            $this->getSearchPattern(),
            $replacement,
            $content
        );
    }
}
