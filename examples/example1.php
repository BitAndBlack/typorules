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
use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$content = 'Dies ist  ein Beispielsatz.Von wem? Von mir. An dich. Keine   Ahnung warum!Ich bin der, der einen Satz schreibt.';

echo 'Running the RemoveDuplicatedWhitespaceRule with content "' . $content . '".' . PHP_EOL;

echo PHP_EOL;

$removeDuplicatedWhitespaceRule = new RemoveDuplicatedWhitespaceRule();

$violations = $removeDuplicatedWhitespaceRule->getViolations($content);
$contentFixed = $removeDuplicatedWhitespaceRule->getContentFixed($content);

echo 'Found ' . count($violations) . ' violations. ' . PHP_EOL;

foreach ($violations as $key => $violation) {
    echo 'Violation ' . $key . ': ' . $violation->getViolationPreview() . PHP_EOL;
}

echo PHP_EOL;

echo 'The fixed content: "' . $contentFixed . '".' . PHP_EOL;

echo PHP_EOL;

echo 'The changes in a diff view: "' . CharacterDiff::create()->getDiff($content, $contentFixed) . '".' . PHP_EOL;