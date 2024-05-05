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
use BitAndBlack\TypoRules\Rule\RuleInterface;
use Nette\Loaders\RobotLoader;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

class DocumentationParser
{
    public function __construct()
    {
    }

    /**
     * @return array<int, Documentation>
     * @throws ReflectionException
     */
    public function getDocumentations(): array
    {
        $rulePath = dirname(new VendorPath()) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Rule';

        $loader = new RobotLoader();
        $loader->addDirectory($rulePath);

        $loader->rebuild();

        $indexedClasses = $loader->getIndexedClasses();

        $documentations = [];

        foreach ($indexedClasses as $class => $path) {
            $implementations = class_implements($class);

            if (false === in_array(RuleInterface::class, $implementations, true)) {
                continue;
            }

            if (str_contains($class, 'Abstract')) {
                continue;
            }

            $documentation = new Documentation($class);
            $documentation->setPath($path);

            $documentations[] = $documentation;

            $reflectionClass = new ReflectionClass($class);
            $attributes = $reflectionClass->getAttributes();

            foreach ($attributes as $attribute) {
                $classAttributeInstance = $attribute->newInstance();

                if ($classAttributeInstance instanceof Description) {
                    $documentation->setDescription(
                        $classAttributeInstance->getDescription()
                    );
                    continue;
                }

                if ($classAttributeInstance instanceof TransformationExample) {
                    $documentation->addTransformationExample(
                        $classAttributeInstance->getBefore(),
                        $classAttributeInstance->getAfter(),
                        $classAttributeInstance->getDescription(),
                    );
                    continue;
                }
            }

            $methods = $reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                $attributes = $method->getAttributes(Configuration::class);

                $methodName = $method->getName();
                $methodParameters = $method->getParameters();

                if ([] === $attributes) {
                    continue;
                }

                foreach ($attributes as $attribute) {
                    $methodAttributeInstance = $attribute->newInstance();

                    if ($methodAttributeInstance instanceof Configuration) {
                        $methodParametersString = implode(
                            ', ',
                            array_map(
                                static fn ($parameter) => '$' . $parameter->getName(),
                                $methodParameters
                            )
                        );

                        $shortName = lcfirst($documentation->getClassNameShort());
                        $exampleConfiguration = '$' . $shortName . '->' . $methodName . '(' . $methodParametersString . ');';

                        $documentation->addConfigurationPossibility(
                            $methodAttributeInstance->getDescription(),
                            $exampleConfiguration
                        );
                    }
                }
            }
        }

        usort(
            $documentations,
            static fn (Documentation $itemA, Documentation $itemB): int => $itemA->getClassName() <=> $itemB->getClassName()
        )
        ;

        return $documentations;
    }
}
