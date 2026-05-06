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

use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;
use Generator;

final class RemoveDuplicatedWhitespaceRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveDuplicatedWhitespaceRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            "Ganz am      Ende.  Wie geht's weiter?",
            "Ganz am Ende. Wie geht's weiter?",
            "Ganz am      Ende.  Wie geht's...",
        ];

        yield [
            "Ganz am Ende. Wie geht's weiter?",
            "Ganz am Ende. Wie geht's weiter?",
            null,
        ];

        yield [
            <<<HTML
                <h1 class="h1 h1--modifier">Überschrift!</h1>
                <p>Dies ist  ein Beispielsatz.Von wem? Von mir. An dich.</p> 
                <p title="Wundervoller     Titel!">Keine   Ahnung warum!Ich bin der, der einen Satz schreibt.</p>
                HTML
            ,
            'Dies ist ein Beispielsatz.Von wem? Von mir. An dich.',
            'Dies ist  ein Beispielsatz...',
        ];
    }
}
