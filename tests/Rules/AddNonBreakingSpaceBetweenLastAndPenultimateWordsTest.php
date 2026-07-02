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
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceBetweenLastAndPenultimateWords;
use Generator;

final class AddNonBreakingSpaceBetweenLastAndPenultimateWordsTest extends AbstractRuleTestClass
{
    public function getBaseTestClass(): string
    {
        return AddNonBreakingSpaceBetweenLastAndPenultimateWords::class;
    }

    public static function getTestRuleData(): Generator
    {
        yield 'Umlaut and exclamation mark' => [
            'Glaube mir: es war so schön!',
            'Glaube mir: es war so' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'schön!',
            '...r: es war so schön!...',
        ];

        yield 'Short word in range' => [
            'Nur ganz kurz.',
            'Nur ganz' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'kurz.',
            'Nur ganz kurz.',
        ];

        yield 'Long word outside range' => [
            'Etwas länger',
            'Etwas länger',
            null,
        ];

        yield 'With a space at the end' => [
            'Nur ganz kurz. ',
            'Nur ganz' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'kurz. ',
            'Nur ganz kurz. ',
        ];

        yield 'With a space at the end and a linebreak' => [
            'Nur ganz kurz. ' . PHP_EOL . 'Zeilenumbruch.',
            'Nur ganz' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'kurz. ' . PHP_EOL . 'Zeilenumbruch.',
            'Nur ganz kurz. ' . PHP_EOL . 'Zeilenumb...',
        ];

        yield 'Works also with HTML' => [
            'Nach <strong>21</strong> Jahren in der Druck- und Medien-Branche gibt es eine Menge Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Automatisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druckbranche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            'Nach <strong>21</strong> Jahren in der Druck- und Medien-Branche gibt es eine Menge Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Automatisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druckbranche, über perfekte Druckdaten und über Typografie, wie sie sein' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'sollte.',
            '...wie sie sein sollte....',
        ];

        /** @todo Fix wrong preview */
        yield 'With different UTF-8 characters' => [
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein sollte.',
            'Nach 21' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'Jahren in der Druck- und Medien-Branche gibt es eine Menge zu erzählen. <strong>Tobias Köngeter</strong> steht Ihnen für Vorträge zur Verfügung und berichtet jederzeit gerne über Auto' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'matisierungen im Bereich Layout, über Programmierung von Drucksachen, über Machine Learning für die Druck' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'branche, über perfekte Druckdaten und über Typografie, wie sie sein' . CharactersEnum::NON_BREAKING_SPACE_UTF8->value . 'sollte.',
            '...die Druck' . CharactersEnum::SOFT_HYPHEN_UTF8->value . 'branche, über p...',
        ];
    }
}
