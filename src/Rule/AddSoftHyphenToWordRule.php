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
use BitAndBlack\TypoRules\Exception\MissingDependencyException;
use Org\Heigl\Hyphenator\Hyphenator;

/**
 * @see \BitAndBlack\TypoRules\Tests\Rules\AddSoftHyphenToWordRuleTest
 */
class AddSoftHyphenToWordRule extends AbstractRule implements RuleInterface
{
    protected string $searchPattern = '/(\w{10,})/';

    protected string $replacePattern = '$1';

    protected ?string $languageCode = null;

    protected string $hyphen;

    private int $minCharacterCountBefore;

    private int $minCharacterCountAfter;

    private int $minWordCharacterCount;

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

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function setHyphen(string $hyphen): self
    {
        $this->hyphen = $hyphen;
        return $this;
    }

    public function setMinCharacterCountBefore(int $minCharacterCountBefore): self
    {
        $this->minCharacterCountBefore = $minCharacterCountBefore;
        return $this;
    }

    public function setMinCharacterCountAfter(int $minCharacterCountAfter): self
    {
        $this->minCharacterCountAfter = $minCharacterCountAfter;
        return $this;
    }

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

        return (string) preg_replace_callback(
            $this->searchPattern,
            static function ($match) use ($hyphenator): string {
                $word = $match[0];
                $wordHyphenated = $hyphenator->hyphenate($word);

                if (!is_string($wordHyphenated)) {
                    return '';
                }

                return $wordHyphenated;
            },
            $content
        );
    }
}
