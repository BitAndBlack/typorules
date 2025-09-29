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

use Nette\Loaders\RobotLoader;
use ReflectionClass;
use ReflectionMethod;

/**
 * @internal
 */
class DocumentationParser
{
    /**
     * @param class-string $implementedClass
     * @return array<int, ClassDocumentation>
     */
    public function getClassDocumentations(string $directory, string $implementedClass): array
    {
        $loader = new RobotLoader();
        $loader->addDirectory($directory);
        $loader->rebuild();

        /** @var array<class-string, string> $indexedClasses */
        $indexedClasses = $loader->getIndexedClasses();
        $classDocumentations = [];

        foreach ($indexedClasses as $class => $path) {
            $implementations = class_implements($class);

            if (false === is_array($implementations)) {
                $implementations = [];
            }

            if (false === in_array($implementedClass, $implementations, true)) {
                continue;
            }

            if (str_contains($class, 'Abstract')) {
                continue;
            }

            $classDocumentation = new ClassDocumentation($class);
            $classDocumentation->setPath($path);

            $classDocumentations[] = $classDocumentation;

            $reflectionClass = new ReflectionClass($class);
            $attributes = $reflectionClass->getAttributes();

            foreach ($attributes as $attribute) {
                $classAttributeInstance = $attribute->newInstance();

                if ($classAttributeInstance instanceof Description) {
                    $classDocumentation->setDescription(
                        $classAttributeInstance->getDescription()
                    );
                    continue;
                }

                if ($classAttributeInstance instanceof TransformationExample) {
                    $classDocumentation->addTransformationExample(
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

                    $methodParametersString = implode(
                        ', ',
                        array_map(
                            static fn ($parameter) => '$' . $parameter->getName(),
                            $methodParameters
                        )
                    );

                    $shortName = lcfirst($classDocumentation->getClassNameShort());
                    $exampleConfiguration = '$' . $shortName . '->' . $methodName . '(' . $methodParametersString . ');';

                    $classDocumentation->addConfigurationPossibility(
                        $methodAttributeInstance->getDescription(),
                        $exampleConfiguration
                    );
                }
            }
        }

        usort(
            $classDocumentations,
            static fn (ClassDocumentation $itemA, ClassDocumentation $itemB): int => $itemA->getClassName() <=> $itemB->getClassName()
        );

        return $classDocumentations;
    }
}
