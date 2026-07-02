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

use BitAndBlack\TypoRules\Rule\RemoveWhitespaceAfterOpeningQuoteRule;
use Generator;

final class RemoveWhitespaceAfterOpeningQuoteRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveWhitespaceAfterOpeningQuoteRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Besonders " wichtige " Information',
            'Besonders "wichtige " Information',
            'Besonders " wichtige " Information',
        ];

        yield [
            'Besonders „ wichtige “ Information',
            'Besonders „wichtige “ Information',
            'Besonders „ wichtige “ Information',
        ];

        yield [
            'Besonders » wichtige « Information',
            'Besonders »wichtige « Information',
            'Besonders » wichtige « Information',
        ];

        yield [
            'Nach 21&nbsp;Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto\u{AD}matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck\u{AD}branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            'Nach 21&nbsp;Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto\u{AD}matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck\u{AD}branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            null,
        ];

        yield [
            "Nach 21\u{A0}Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. ",
            "Nach 21\u{A0}Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. ",
            null,
        ];
    }
}
