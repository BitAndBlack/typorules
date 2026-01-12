<?php

declare(strict_types=1);

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Tests\Rules;

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Rule\AddSoftHyphenToWordRule;
use Generator;

final class AddSoftHyphenToWordRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddSoftHyphenToWordRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Kann man mit gutem Gewissen Bodenseefelchen essen?',
            'Kann man mit gutem Gewissen Boden' . CharactersEnum::SOFT_HYPHEN->value . 'see' . CharactersEnum::SOFT_HYPHEN->value . 'felchen essen?',
            '...em Gewissen Bodenseefelchen essen?...',
        ];

        yield [
            'Bodensee',
            'Bodensee',
            null,
        ];
    }

    public function testCanChangeSettings(): void
    {
        $addSoftHyphenToWordRule = AddSoftHyphenToWordRule::create()
            ->setMinCharacterCountBefore(2)
            ->setMinCharacterCountBefore(2)
            ->setMinWordCharacterCount(6)
            ->setHyphen('&shy;')
        ;

        $content = 'Bodenseefelchen';
        $contentFixed = $addSoftHyphenToWordRule->getContentFixed($content);

        self::assertSame(
            'Bo&shy;den&shy;see&shy;felchen',
            $contentFixed
        );
    }
}
