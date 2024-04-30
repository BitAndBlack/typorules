<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules;

use BitAndBlack\TypoRules\Rule\RuleInterface;

class Violation
{
    public function __construct(
        private readonly RuleInterface $rule,
        private readonly string $content,
        private readonly int $violationPosition,
        private readonly string $violatedPart,
    ) {
    }

    public function getRule(): RuleInterface
    {
        return $this->rule;
    }

    public function getViolationPosition(): int
    {
        return $this->violationPosition;
    }

    public function getViolatedPart(): string
    {
        return $this->violatedPart;
    }

    public function getViolationPreview(int $length = 12): string
    {
        $content = $this->content;
        $contentLength = strlen($content);

        $stringBefore = '...';
        $stringAfter = '...';

        $start = $this->violationPosition - $length;
        $end = ($length * 2) + strlen($this->violatedPart);

        if ($start <= 0) {
            $start = 0;
            $stringBefore = '';
        }

        if ($end >= $contentLength) {
            $end = $contentLength;
            $stringAfter = '';
        }

        $preview = substr($content, $start, $end);

        return $stringBefore . $preview . $stringAfter;
    }

    public function getContentFixed(): string
    {
        return $this->getRule()->getContentFixed(
            $this->content
        );
    }
}
