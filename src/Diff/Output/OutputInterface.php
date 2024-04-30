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

interface OutputInterface
{
    public function getInsertStart(): string;

    public function getInsertEnd(): string;

    public function getDeleteStart(): string;

    public function getDeleteEnd(): string;
}
