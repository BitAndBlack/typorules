<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Diff;

use BitAndBlack\TypoRules\Diff\Output\CliOutput;
use BitAndBlack\TypoRules\Diff\Output\HtmlOutput;
use BitAndBlack\TypoRules\Diff\Output\OutputInterface;

/**
 * This class is based on the work of {@see https://stackoverflow.com/users/58805/calmarius}
 * in {@see https://stackoverflow.com/a/22021254/8252855}. Thank you!
 */
class CharacterDiff
{
    private readonly OutputInterface $output;

    public function __construct(OutputInterface $output = null)
    {
        $autoDecidedOutput = 'cli' === PHP_SAPI
            ? new CliOutput()
            : new HtmlOutput()
        ;

        $this->output = $output ?? $autoDecidedOutput;
    }

    public static function create(OutputInterface $output = null): self
    {
        return new self($output);
    }

    /**
     * @param array<int, string> $from
     * @param array<int, string> $to
     * @return array{
     *     values: array<int, string>,
     *     mask: array<int, int>,
     * }
     */
    private function computeDiff(array $from, array $to): array
    {
        $diffValues = [];
        $diffMask = [];

        $dm = [];
        $fromCount = count($from);
        $toCount = count($to);

        for ($counter = -1; $counter < $toCount; $counter++) {
            $dm[-1][$counter] = 0;
        }

        for ($counter = -1; $counter < $fromCount; $counter++) {
            $dm[$counter][-1] = 0;
        }

        for ($counterA = 0; $counterA < $fromCount; $counterA++) {
            for ($counterB = 0; $counterB < $toCount; $counterB++) {
                if ($from[$counterA] === $to[$counterB]) {
                    $ad = $dm[$counterA - 1][$counterB - 1];
                    $dm[$counterA][$counterB] = $ad + 1;
                } else {
                    $a1 = $dm[$counterA - 1][$counterB];
                    $a2 = $dm[$counterA][$counterB - 1];
                    $dm[$counterA][$counterB] = max($a1, $a2);
                }
            }
        }

        $i = $fromCount - 1;
        $j = $toCount - 1;

        while (($i > -1) || ($j > -1)) {
            if (($j > -1) && $dm[$i][$j - 1] === $dm[$i][$j]) {
                $diffValues[] = $to[$j];
                $diffMask[] = 1;
                $j--;
                continue;
            }

            $diffValues[] = $from[$i];

            if (($i > -1) && $dm[$i - 1][$j] === $dm[$i][$j]) {
                $diffMask[] = -1;
                $i--;
                continue;
            }

            $diffMask[] = 0;
            $i--;
            $j--;
        }

        $diffValues = array_reverse($diffValues);
        $diffMask = array_reverse($diffMask);

        return [
            'values' => $diffValues,
            'mask' => $diffMask,
        ];
    }

    public function getDiff(string $before, string $after): string
    {
        $diff = $this->computeDiff(
            str_split($before),
            str_split($after)
        );

        $diffValue = $diff['values'];
        $diffMask = $diff['mask'];

        $diffValueCount = count($diffValue);
        $pmc = 0;
        $result = '';

        for ($counter = 0; $counter < $diffValueCount; $counter++) {
            $mc = $diffMask[$counter];

            if ($mc !== $pmc) {
                switch ($pmc) {
                    case -1: $result .= $this->output->getDeleteEnd();
                        break;
                    case 1: $result .= $this->output->getInsertEnd();
                        break;
                }

                switch ($mc) {
                    case -1: $result .= $this->output->getDeleteStart();
                        break;
                    case 1: $result .= $this->output->getInsertStart();
                        break;
                }
            }

            $result .= $diffValue[$counter];
            $pmc = $mc;
        }

        match ($pmc) {
            -1 => $result .= $this->output->getDeleteEnd(),
            1 => $result .= $this->output->getInsertEnd(),
            default => $result,
        };

        return $result;
    }
}
