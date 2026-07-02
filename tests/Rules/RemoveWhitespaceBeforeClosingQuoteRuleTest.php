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
use BitAndBlack\TypoRules\Rule\RemoveWhitespaceBeforeClosingQuoteRule;
use Generator;

final class RemoveWhitespaceBeforeClosingQuoteRuleTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return RemoveWhitespaceBeforeClosingQuoteRule::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield [
            'Besonders "wichtige " Information',
            'Besonders "wichtige" Information',
            'Besonders "wichtige " Information',
        ];

        yield [
            'Besonders „wichtige “ Information',
            'Besonders „wichtige“ Information',
            'Besonders „wichtige “ Information',
        ];

        yield [
            'Besonders »wichtige « Information',
            'Besonders »wichtige« Information',
            'Besonders »wichtige « Information',
        ];

        yield [
            'Besonders "wichtig "',
            'Besonders "wichtig"',
            'Besonders "wichtig "',
        ];

        yield [
            'Besonders "wichtig ".',
            'Besonders "wichtig".',
            'Besonders "wichtig ".',
        ];

        yield [
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_HTML->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_HTML->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_HTML->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_HTML->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_HTML->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_HTML->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            null,
        ];

        yield [
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            null,
        ];
    }
}
