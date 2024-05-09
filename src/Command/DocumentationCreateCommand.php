<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Command;

use BitAndBlack\Composer\VendorPath;
use BitAndBlack\TypoRules\Documentation\DocumentationParser;
use BitAndBlack\TypoRules\Documentation\DocumentationWriter;
use BitAndBlack\TypoRules\Rule\RuleInterface;
use BitAndBlack\TypoRules\RuleSet\RuleSetInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DocumentationCreateCommand extends Command
{
    public function configure(): void
    {
        $this
            ->setName('documentation:create')
            ->setDescription('Creates the documentation files for all rules and rule sets.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $root = dirname(new VendorPath()) . DIRECTORY_SEPARATOR;

        $documentationParser = new DocumentationParser();
        $documentations = $documentationParser->getDocumentations(
            $root . 'src' . DIRECTORY_SEPARATOR . 'Rule',
            RuleInterface::class
        );

        $documentationWriter = new DocumentationWriter($documentations);
        $documentationWriter
            ->setClassDescriptionSingular('rule')
            ->setClassDescriptionPlural('rules')
            ->create(
                $root . 'docs' . DIRECTORY_SEPARATOR . 'rules.md',
            )
        ;

        $documentationParser = new DocumentationParser();
        $documentations = $documentationParser->getDocumentations(
            $root . 'src' . DIRECTORY_SEPARATOR . 'RuleSet',
            RuleSetInterface::class
        );

        $documentationWriter = new DocumentationWriter($documentations);
        $documentationWriter
            ->setClassDescriptionSingular('rule set')
            ->setClassDescriptionPlural('rule sets')
            ->create(
                $root . 'docs' . DIRECTORY_SEPARATOR . 'rulesets.md',
            )
        ;

        return Command::SUCCESS;
    }
}
