<?php

/**
 * Bit&Black TypoRules.
 *
 * @author Tobias Köngeter
 * @copyright Copyright © Bit&Black
 * @link https://www.bitandblack.com
 * @license MIT
 */

namespace BitAndBlack\TypoRules\Rule;

use BitAndBlack\Helpers\XMLHelper;
use BitAndBlack\TypoRules\Violation;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;

abstract class AbstractRule implements RuleInterface
{
    protected string $searchPattern;

    protected string $replacePattern;

    /**
     * Returns a list of all violations in the given input.
     *
     * @return array<int, Violation>
     */
    public function getViolations(string $content): array
    {
        $contentStriped = strip_tags($content);
        $doesContentContainHtml = $content !== $contentStriped;

        $violations = [];

        if (false === $doesContentContainHtml) {
            preg_match_all(
                $this->getSearchPattern(),
                $content,
                $violationsFound,
                PREG_OFFSET_CAPTURE
            );

            foreach ($violationsFound[0] as $violation) {
                $violations[] = new Violation(
                    $this,
                    $content,
                    $violation[1],
                    $violation[0],
                );
            }

            return $violations;
        }

        $tempNodeName = 'temp';

        $domDocument = new DOMDocument('1.0', 'UTF-8');
        XMLHelper::loadHTML($domDocument, '<' . $tempNodeName . '>' . $content . '</' . $tempNodeName . '>');

        $callback = function (string $contentExtracted) use (&$violations): string {
            preg_match_all(
                $this->getSearchPattern(),
                $contentExtracted,
                $violationsFound,
                PREG_OFFSET_CAPTURE
            );

            foreach ($violationsFound[0] as $violation) {
                $violations[] = new Violation(
                    $this,
                    $contentExtracted,
                    $violation[1],
                    $violation[0],
                );
            }

            return $contentExtracted;
        };

        $this->extractDomContent(
            $domDocument,
            $callback
        );

        return $violations;
    }

    /**
     * Returns the search pattern for this rule.
     */
    public function getSearchPattern(): string
    {
        return $this->searchPattern;
    }

    /**
     * Returns the replacement pattern for this rule.
     */
    public function getReplacePattern(): string
    {
        return $this->replacePattern;
    }

    /**
     * Returns the fixed input content.
     */
    public function getContentFixed(string $content): string
    {
        $contentStriped = strip_tags($content);
        $doesContentContainHtml = $content !== $contentStriped;

        if (false === $doesContentContainHtml) {
            return (string) preg_replace(
                $this->getSearchPattern(),
                $this->getReplacePattern(),
                $content
            );
        }

        $tempNodeName = 'temp';

        $domDocument = new DOMDocument('1.0', 'UTF-8');

        XMLHelper::loadHTML($domDocument, '<' . $tempNodeName . '>' . $content . '</' . $tempNodeName . '>');

        $callback = fn (string $content): string => (string) preg_replace(
            $this->getSearchPattern(),
            $this->getReplacePattern(),
            $content
        );

        $this->extractDomContent(
            $domDocument,
            $callback
        );

        $tempNodeFirst = $domDocument->getElementsByTagName($tempNodeName)->item(0);
        $hasChildNodes = null !== $tempNodeFirst && $tempNodeFirst->hasChildNodes();
        $childNodes = true === $hasChildNodes ? $tempNodeFirst->childNodes : [];
        $childNodesHtml = [];

        foreach ($childNodes as $childNode) {
            $childNodesHtml[] = $domDocument->saveHTML($childNode);
        }

        return implode('', $childNodesHtml);
    }

    /**
     * @param callable(non-empty-string):string $callback
     */
    private function extractDomContent(DOMDocument $domDocument, callable $callback): void
    {
        $attributesToHandle = [
            'alt',
            'title',
        ];

        $traverse = static function (DOMNode $domNode) use ($attributesToHandle, &$traverse, $callback): void {
            if ($domNode instanceof DomElement) {
                foreach ($attributesToHandle as $attributeToHandle) {
                    if (false === $domNode->hasAttribute($attributeToHandle)) {
                        continue;
                    }

                    $value = $domNode->getAttribute($attributeToHandle);

                    if ('' === $value) {
                        continue;
                    }

                    $value = $callback($value);
                    $domNode->setAttribute($attributeToHandle, $value);
                }
            }

            foreach ($domNode->childNodes as $child) {
                if ($child instanceof DOMElement) {
                    $traverse($child);
                    continue;
                }

                if ($child instanceof DOMText) {
                    /**
                     * Only process text nodes that aren't pure indentation.
                     * Indentation nodes appear between tags and have no sibling elements
                     * at the same level — but the safest check is whether the parent
                     * has any element children at all (mixed content vs text-only).
                     */
                    $hasElementSiblings = false;

                    foreach ($domNode->childNodes as $sibling) {
                        if ($sibling instanceof DOMElement) {
                            $hasElementSiblings = true;
                            break;
                        }
                    }

                    /**
                     * Text-only parent: this is real content, not indentation.
                     */
                    if (false === $hasElementSiblings) {
                        $value = $child->nodeValue;

                        if ('' === $value || null === $value) {
                            continue;
                        }

                        $value = $callback($value);
                        $child->nodeValue = $value;
                    }
                }
            }
        };

        $node = $domDocument->getElementsByTagName('temp')->item(0);

        if (null === $node) {
            return;
        }

        $traverse($node);
    }
}
