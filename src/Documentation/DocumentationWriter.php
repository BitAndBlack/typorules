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

class DocumentationWriter
{
    private string $classDescriptionSingular;

    private string $classDescriptionPlural;

    private bool $addTOCtoDocumentation;

    /**
     * @param array<int, ClassDocumentation> $documentations
     */
    public function __construct(
        private readonly array $documentations,
    ) {
        $this->classDescriptionSingular = 'entity';
        $this->classDescriptionPlural = 'entities';
        $this->addTOCtoDocumentation = true;
    }

    public function create(string $file): bool
    {
        $output = '';

        $output .= '# ' . ucfirst($this->classDescriptionPlural) . ' documentation';
        $output .= PHP_EOL;
        $output .= PHP_EOL;
        $output .= 'There are currently ' . count($this->documentations) . ' ' . $this->classDescriptionPlural . ' available.';
        $output .= PHP_EOL;
        $output .= PHP_EOL;

        if (true === $this->addTOCtoDocumentation) {
            $output .= '## TOC';
            $output .= PHP_EOL;
            $output .= PHP_EOL;

            foreach ($this->documentations as $key => $documentation) {
                $output .= '-   [`' . $documentation->getClassNameShort() . '`](#' . strtolower($documentation->getClassNameShort()) . ')';
                $output .= PHP_EOL;
            }

            $output .= PHP_EOL;
        }

        $output .= '## ' . ucfirst($this->classDescriptionPlural);
        $output .= PHP_EOL;
        $output .= PHP_EOL;

        foreach ($this->documentations as $key => $documentation) {
            $output .= '### `' . $documentation->getClassNameShort() . '`';
            $output .= PHP_EOL;
            $output .= PHP_EOL;
            $output .= '#### Description';
            $output .= PHP_EOL;
            $output .= PHP_EOL;
            $output .= $documentation->getDescription() ?? 'No description provided.';
            $output .= PHP_EOL;
            $output .= PHP_EOL;

            if ([] !== $transformationExamples = $documentation->getTransformationExamples()) {
                $output .= '#### Transformation example';

                $isList = false;

                foreach ($transformationExamples as $transformationExample) {
                    $output .= PHP_EOL;
                    $output .= PHP_EOL;

                    if (isset($transformationExample[2])) {
                        $isList = true;

                        $output .= '-   ' . $transformationExample[2] . ':';
                        $output .= PHP_EOL;
                        $output .= PHP_EOL;
                    }

                    $addition = '';

                    if (true === $isList) {
                        $addition = '    ';
                    }

                    $output .= $addition . '```diff';
                    $output .= PHP_EOL;
                    $output .= $addition . '- ' . $transformationExample[0];
                    $output .= PHP_EOL;
                    $output .= $addition . '+ ' . $transformationExample[1];
                    $output .= PHP_EOL;
                    $output .= $addition . '```';
                }

                $output .= PHP_EOL;
                $output .= PHP_EOL;
            }

            $output .= '#### Possible ' . $this->classDescriptionSingular . ' customization';
            $output .= PHP_EOL;
            $output .= PHP_EOL;

            if ([] !== $configurationPossibilities = $documentation->getConfigurationPossibilities()) {
                $configurationPossibilitiesCount = count($configurationPossibilities);

                $output .= 'There ' . (1 === $configurationPossibilitiesCount ? 'is' : 'are') . ' ' . $configurationPossibilitiesCount . ' ' . (1 === $configurationPossibilitiesCount ? 'possibility' : 'possibilities') . ' to customize this rule:';

                foreach ($configurationPossibilities as $configurationPossibility) {
                    $output .= PHP_EOL;
                    $output .= PHP_EOL;
                    $output .= '-   ' . $configurationPossibility[0];
                    $output .= PHP_EOL;
                    $output .= PHP_EOL;
                    $output .= '    ```php';
                    $output .= PHP_EOL;
                    $output .= '    ' . $configurationPossibility[1];
                    $output .= PHP_EOL;
                    $output .= '    ```';
                }
            } else {
                $output .= 'This ' . $this->classDescriptionSingular . ' doesn\'t allow any customization.';
            }

            $output .= PHP_EOL;
            $output .= PHP_EOL;

            if (null !== $path = $documentation->getPath()) {
                $relativePath = $documentation->getRelativePath(
                    dirname(new VendorPath()) . DIRECTORY_SEPARATOR . 'docs',
                    $path
                );

                $output .= '#### File';
                $output .= PHP_EOL;
                $output .= PHP_EOL;
                $output .= 'This ' . $this->classDescriptionSingular . ' is located under [' . $relativePath . '](' . $relativePath . ')';
                $output .= PHP_EOL;
                $output .= PHP_EOL;
            }

            $output .= '----';
            $output .= PHP_EOL;
            $output .= PHP_EOL;
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

    public function addTOCtoDocumentation(bool $addTOCtoDocumentation): self
    {
        $this->addTOCtoDocumentation = $addTOCtoDocumentation;
        return $this;
    }
}
