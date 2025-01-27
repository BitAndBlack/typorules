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
use ReflectionException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DocumentationCreateCommand extends Command
{
    public function configure(): void
    {
        $this
            ->setName('documentation:create')
            ->setDescription('Creates the documentation files for all rules and rule sets.')
        ;
    }

    /**
     * @throws ReflectionException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $root = dirname(new VendorPath()) . DIRECTORY_SEPARATOR;

        $documentationParser = new DocumentationParser();
        $classDocumentations = $documentationParser->getClassDocumentations(
            $root . 'src' . DIRECTORY_SEPARATOR . 'Rule',
            RuleInterface::class
        );

        $documentationWriter = new DocumentationWriter($classDocumentations);
        $documentationWriter
            ->setClassDescriptionSingular('rule')
            ->setClassDescriptionPlural('rules')
            ->addTocToDocumentation(false)
            ->create(
                $root . 'docs' . DIRECTORY_SEPARATOR . 'rules.md',
            )
        ;

        $documentationParser = new DocumentationParser();
        $classDocumentations = $documentationParser->getClassDocumentations(
            $root . 'src' . DIRECTORY_SEPARATOR . 'RuleSet',
            RuleSetInterface::class
        );

        $documentationWriter = new DocumentationWriter($classDocumentations);
        $documentationWriter
            ->setClassDescriptionSingular('rule set')
            ->setClassDescriptionPlural('rule sets')
            ->addTocToDocumentation(false)
            ->create(
                $root . 'docs' . DIRECTORY_SEPARATOR . 'rulesets.md',
            )
        ;

        $io->success('Documentation created.');

        return Command::SUCCESS;
    }
}
