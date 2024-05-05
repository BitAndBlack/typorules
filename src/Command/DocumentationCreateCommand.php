<?php

namespace BitAndBlack\TypoRules\Command;

use BitAndBlack\TypoRules\Documentation\DocumentationParser;
use BitAndBlack\TypoRules\Documentation\DocumentationWriter;
use ReflectionException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DocumentationCreateCommand extends Command
{
    public function configure(): void
    {
        $this
            ->setName('documentation:create')
        ;
    }

    /**
     * @throws ReflectionException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $documentationParser = new DocumentationParser();
        $documentations = $documentationParser->getDocumentations();

        $documentationWriter = new DocumentationWriter();
        $documentationWriter->create($documentations);

        return Command::SUCCESS;
    }
}
