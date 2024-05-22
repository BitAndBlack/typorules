<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

use BitAndBlack\TypoRules\CharactersEnum;
use BitAndBlack\TypoRules\Diff\CharacterDiff;
use BitAndBlack\TypoRules\Rule\AddNonBreakingSpaceAfterDoctorRule;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$content = 'Ich bin Dr. Tobias Köngeter.';

echo 'Running the AddNonBreakingSpaceAfterDoctorRule with content "' . $content . '".' . PHP_EOL;

echo PHP_EOL;

$addNonBreakingSpaceAfterDoctorRule = AddNonBreakingSpaceAfterDoctorRule::create()
    ->setNonBreakingSpace(CharactersEnum::NON_BREAKING_SPACE_THIN->value)
;

$violations = $addNonBreakingSpaceAfterDoctorRule->getViolations($content);
$contentFixed = $addNonBreakingSpaceAfterDoctorRule->getContentFixed($content);

echo 'Found ' . count($violations) . ' violations. ' . PHP_EOL;

foreach ($violations as $key => $violation) {
    echo 'Violation ' . $key . ': ' . $violation->getViolationPreview() . PHP_EOL;
}

echo PHP_EOL;

echo 'The fixed content: "' . $addNonBreakingSpaceAfterDoctorRule->getContentFixed($content) . '".' . PHP_EOL;

echo PHP_EOL;

echo 'The changes in a diff view: "' . CharacterDiff::create()->getDiff($content, $contentFixed) . '".' . PHP_EOL;
