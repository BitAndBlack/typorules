<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Diff\Output;

class HtmlOutput implements OutputInterface
{
    private readonly string $insertStart;

    private readonly string $insertEnd;

    private readonly string $deleteStart;

    private readonly string $deleteEnd;

    public function __construct()
    {
        $this->insertStart = '<ins>';
        $this->insertEnd = '</ins>';
        $this->deleteStart = '<del>';
        $this->deleteEnd = '</del>';
    }

    public function getInsertStart(): string
    {
        return $this->insertStart;
    }

    public function getInsertEnd(): string
    {
        return $this->insertEnd;
    }

    public function getDeleteStart(): string
    {
        return $this->deleteStart;
    }

    public function getDeleteEnd(): string
    {
        return $this->deleteEnd;
    }
}
