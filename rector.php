<?php

use Rector\Config\RectorConfig;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\Set\PHPUnitSetList;

return RectorConfig::configure()
    ->withParallel()
    ->withPaths([
        __DIR__,
    ])
    ->withSkip([
        __DIR__ . DIRECTORY_SEPARATOR . 'vendor',
        PreferPHPUnitThisCallRector::class,
    ])
    ->withPhpSets()
    ->withSets([
        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    ])
    ->withImportNames()
;
