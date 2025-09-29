<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Documentation;

use BitAndBlack\Composer\VendorPath;
use ReflectionException;

/**
 * @internal
 */
class DocumentationWriter
{
    private string $classDescriptionSingular;

    private string $classDescriptionPlural;

    private bool $addTOCtoDocumentation;

    /**
     * @param array<int, ClassDocumentation> $classDocumentations
     */
    public function __construct(
        private readonly array $classDocumentations,
    ) {
        $this->classDescriptionSingular = 'entity';
        $this->classDescriptionPlural = 'entities';
        $this->addTOCtoDocumentation = true;
    }

    /**
     * @throws ReflectionException
     */
    public function create(string $file): bool
    {
        $output = $this->adH1(
            ucfirst($this->classDescriptionPlural) . ' documentation'
        );
        $output .= $this->addSectionSeparator();
        $output .= 'There are currently ' . count($this->classDocumentations) . ' ' . $this->classDescriptionPlural . ' available.';
        $output .= $this->addSectionSeparator();

        if (true === $this->addTOCtoDocumentation) {
            $output .= $this->addH2('TOC');
            $output .= $this->addSectionSeparator();

            foreach ($this->classDocumentations as $classDocumentation) {
                $output .= '-   [`' . $classDocumentation->getClassNameShort() . '`](#' . strtolower($classDocumentation->getClassNameShort()) . ')';
                $output .= PHP_EOL;
            }

            $output .= PHP_EOL;
        }

        $output .= $this->addH2(
            ucfirst($this->classDescriptionPlural)
        );
        $output .= $this->addSectionSeparator();

        foreach ($this->classDocumentations as $classDocumentation) {
            $output .= $this->addH3('`' . $classDocumentation->getClassNameShort() . '`');
            $output .= $this->addSectionSeparator();
            $output .= $this->addH4('Description');
            $output .= $this->addSectionSeparator();
            $output .= $classDocumentation->getDescription() ?? 'No description provided.';
            $output .= $this->addSectionSeparator();

            if ([] !== $transformationExamples = $classDocumentation->getTransformationExamples()) {
                $output .= $this->addH4('Transformation example');

                $isList = false;

                foreach ($transformationExamples as $transformationExample) {
                    $output .= $this->addSectionSeparator();

                    if (null !== $transformationExample['description']) {
                        $isList = true;

                        $output .= '-   ' . $transformationExample['description'] . ':';
                        $output .= $this->addSectionSeparator();
                    }

                    $indentationLevel = true === $isList ? 1 : 0;

                    $output .= $this->addDiff(
                        $transformationExample['before'],
                        $transformationExample['after'],
                        $indentationLevel
                    );
                }

                $output .= $this->addSectionSeparator();
            }

            $output .= $this->addH4('Possible ' . $this->classDescriptionSingular . ' customization');
            $output .= $this->addSectionSeparator();

            if ([] !== $configurationPossibilities = $classDocumentation->getConfigurationPossibilities()) {
                $configurationPossibilitiesCount = count($configurationPossibilities);

                $output .= 'There ' . (1 === $configurationPossibilitiesCount ? 'is' : 'are') . ' ' . $configurationPossibilitiesCount . ' ' . (1 === $configurationPossibilitiesCount ? 'possibility' : 'possibilities') . ' to customize this rule:';

                foreach ($configurationPossibilities as $configurationPossibility) {
                    $output .= $this->addSectionSeparator();
                    $output .= '-   ' . $configurationPossibility[0];
                    $output .= $this->addSectionSeparator();
                    $output .= $this->addCode('php', $configurationPossibility[1], 1);
                }
            } else {
                $output .= 'This ' . $this->classDescriptionSingular . ' doesn\'t allow any customization.';
            }

            $output .= $this->addSectionSeparator();

            if (null !== $path = $classDocumentation->getPath()) {
                $relativePath = $classDocumentation->getRelativePath(
                    dirname(new VendorPath()) . DIRECTORY_SEPARATOR . 'docs',
                    $path
                );

                $output .= $this->addH4('File');
                $output .= $this->addSectionSeparator();
                $output .= 'This ' . $this->classDescriptionSingular . ' is located under [' . $relativePath . '](' . $relativePath . ')';
                $output .= $this->addSectionSeparator();
            }

            $output .= $this->addLine();
            $output .= $this->addSectionSeparator();
        }

        return false !== file_put_contents($file, $output);
    }

    public function setClassDescriptionSingular(string $classDescriptionSingular): self
    {
        $this->classDescriptionSingular = $classDescriptionSingular;
        return $this;
    }

    public function setClassDescriptionPlural(string $classDescriptionPlural): self
    {
        $this->classDescriptionPlural = $classDescriptionPlural;
        return $this;
    }

    public function addTocToDocumentation(bool $addTOCtoDocumentation): self
    {
        $this->addTOCtoDocumentation = $addTOCtoDocumentation;
        return $this;
    }

    private function addSectionSeparator(): string
    {
        return str_repeat(PHP_EOL, 2);
    }

    private function adH1(string $h1): string
    {
        return '# ' . $h1;
    }

    private function addH2(string $h2): string
    {
        return '## ' . $h2;
    }

    private function addH3(string $h3): string
    {
        return '### ' . $h3;
    }

    private function addH4(string $h): string
    {
        return '#### ' . $h;
    }

    private function addCode(string $language, string $code, int $indentationLevel = 0): string
    {
        $whitspace = $this->getWhitespaceForIndentationLevel($indentationLevel);

        $output = $whitspace . '```' . $language . PHP_EOL;
        $output .= $whitspace . $code . PHP_EOL;
        $output .= $whitspace . '```';

        return $output;
    }

    private function addLine(): string
    {
        return '----';
    }

    private function addDiff(string $before, string $after, int $indentationLevel = 0): string
    {
        $whitspace = $this->getWhitespaceForIndentationLevel($indentationLevel);

        $output = $whitspace . '```diff' . PHP_EOL;
        $output .= $whitspace . '- ' . $before . PHP_EOL;
        $output .= $whitspace . '+ ' . $after . PHP_EOL;
        $output .= $whitspace . '```';

        return $output;
    }

    private function getWhitespaceForIndentationLevel(int $indentationLevel): string
    {
        return str_repeat(' ', $indentationLevel * 4);
    }
}
