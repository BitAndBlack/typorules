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

use ReflectionClass;
use ReflectionException;

/**
 * @internal
 */
class ClassDocumentation
{
    private ?string $description = null;

    private ?string $path = null;

    /**
     * @var array<int, array{
     *     before: string,
     *     after: string,
     *     description: string|null,
     * }>
     */
    private array $transformationExamples = [];

    /**
     * @var array<int, array<int, string>>
     */
    private array $configurationPossibilities = [];

    /**
     * @param class-string $className
     */
    public function __construct(
        private readonly string $className,
    ) {
    }

    /**
     * @return class-string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @throws ReflectionException
     */
    public function getClassNameShort(): string
    {
        $reflectionClass = new ReflectionClass($this->getClassName());
        return $reflectionClass->getShortName();
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return array<int, array{
     *      before: string,
     *      after: string,
     *      description: string|null,
     *  }>
     */
    public function getTransformationExamples(): array
    {
        return $this->transformationExamples;
    }

    public function addTransformationExample(
        string $before,
        string $after,
        ?string $description = null,
    ): self {
        $this->transformationExamples[] = [
            'before' => $before,
            'after' => $after,
            'description' => $description,
        ];
        return $this;
    }

    /**
     * Thanks {@see https://stackoverflow.com/a/2638272/8252855} from user {@see https://stackoverflow.com/users/208809/gordon}.
     *
     * @return string
     */
    public function getRelativePath(string $from, string $to): string
    {
        $from = is_dir($from)
            ? rtrim($from, '\/') . '/'
            : $from
        ;

        $to = is_dir($to)
            ? rtrim($to, '\/') . '/'
            : $to
        ;

        $from = str_replace('\\', '/', $from);
        $to = str_replace('\\', '/', $to);

        $from = explode('/', $from);
        $to = explode('/', $to);

        $relPath = $to;

        foreach ($from as $depth => $dir) {
            if ($dir === $to[$depth]) {
                array_shift($relPath);
                continue;
            }

            $remaining = count($from) - $depth;

            if ($remaining > 1) {
                $padLength = (count($relPath) + $remaining - 1) * -1;
                $relPath = array_pad($relPath, $padLength, '..');
                break;
            }

            $relPath[0] = './' . $relPath[0];
        }

        return implode('/', $relPath);
    }

    public function addConfigurationPossibility(string $description, string $exampleConfiguration): self
    {
        $this->configurationPossibilities[] = [
            $description,
            $exampleConfiguration,
        ];

        return $this;
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function getConfigurationPossibilities(): array
    {
        return $this->configurationPossibilities;
    }
}
