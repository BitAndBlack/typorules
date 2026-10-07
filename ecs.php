<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ClassNotation\OrderedTypesFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\LanguageConstruct\NullableTypeDeclarationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return ECSConfig::configure()
    ->withParallel()
    ->withPaths([
        __DIR__,
    ])
    ->withSkip([
        __DIR__ . DIRECTORY_SEPARATOR . 'vendor',
    ])
    ->withSets([
        SetList::PSR_12,
        SetList::ARRAY,
        SetList::CLEAN_CODE,
    ])
    ->withConfiguredRule(YodaStyleFixer::class, [
        'always_move_variable' => true,
    ])
    ->withConfiguredRule(NullableTypeDeclarationFixer::class, [
        'syntax' => 'union',
    ])
    ->withConfiguredRule(OrderedTypesFixer::class, [
        'null_adjustment' => 'always_last',
        'sort_algorithm' => 'none',
    ])
;
