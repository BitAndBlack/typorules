<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

use BitAndBlack\TypoRules\Diff\CharacterDiff;
use BitAndBlack\TypoRules\RuleSet\GermanRuleSet;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$content = 'Dies ist  ein Beispielsatz.Von wem? Von mir. An dich - Keine   Ahnung warum!Ich bin der , der einen Satz schreibt. Nr.1 ist wie das kleine 1x1!!! This library has been created and tested and is used by and, and, and... (c) Bit&Black.';

echo 'Running the GermanRuleSet with content "' . $content . '".' . PHP_EOL;

echo PHP_EOL;

$germanRuleSet = new GermanRuleSet();
$violations = $germanRuleSet->getViolations($content);
$contentFixed = $germanRuleSet->getContentFixed($content);

echo 'Found ' . count($violations) . ' violations. ' . PHP_EOL;

$violationsSorted = [];

foreach ($violations as $key => $violation) {
    $violationsSorted[$violation->getRule()::class][] = $violation;
}

foreach ($violationsSorted as $violationClass => $violations) {
    echo PHP_EOL;

    echo 'Violated rule: ' . (new ReflectionClass($violationClass))->getShortName() . '' . PHP_EOL;

    foreach ($violations as $key => $violation) {
        echo 'Violation ' . ($key + 1) . ': ' . $violation->getViolationPreview() . PHP_EOL;
    }
}

echo PHP_EOL;

echo 'The fixed content: "' . $germanRuleSet->getContentFixed($content) . '".' . PHP_EOL;

echo PHP_EOL;

echo 'The changes in a diff view: "' . CharacterDiff::create()->getDiff($content, $contentFixed) . '".' . PHP_EOL;