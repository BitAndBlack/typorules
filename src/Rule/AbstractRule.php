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
use BitAndBlack\TypoRules\Util\StringHelper;
use BitAndBlack\TypoRules\Violation;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;
use InvalidArgumentException;

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
        $this->assertPatternsAreUsable();

        if (false === mb_check_encoding($content, 'UTF-8')) {
            return [];
        }

        $doesContentContainHtml = StringHelper::doesStringContainHtml($content);

        $violations = [];

        if (false === $doesContentContainHtml) {
            $result = preg_match_all(
                $this->getSearchPattern(),
                $content,
                $violationsFound,
                PREG_OFFSET_CAPTURE
            );

            if (false === $result) {
                return [];
            }

            foreach ($violationsFound[0] as $violation) {
                $violations[] = new Violation(
                    $this,
                    $content,
                    $this->convertByteOffsetToCharOffset($content, $violation[1]),
                    $violation[0],
                );
            }

            return $violations;
        }

        $tempNodeName = 'temp';

        $domDocument = new DOMDocument('1.0', 'UTF-8');
        XMLHelper::loadHTML($domDocument, '<' . $tempNodeName . '>' . $content . '</' . $tempNodeName . '>');

        $offsetCursor = 0;

        $callback = function (string $contentExtracted) use ($content, &$violations, &$offsetCursor): string {
            preg_match_all(
                $this->getSearchPattern(),
                $contentExtracted,
                $violationsFound,
                PREG_OFFSET_CAPTURE
            );

            $nodeOffset = $this->findOffsetInContent($content, $contentExtracted, $offsetCursor);
            $offsetCursor = $nodeOffset + strlen($contentExtracted);
            $nodeOffsetInChars = $this->convertByteOffsetToCharOffset($content, $nodeOffset);

            foreach ($violationsFound[0] as $violation) {
                $violations[] = new Violation(
                    $this,
                    $content,
                    $nodeOffsetInChars + $this->convertByteOffsetToCharOffset($contentExtracted, $violation[1]),
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
     *
     * @throws InvalidArgumentException when the pattern has not been configured
     */
    public function getSearchPattern(): string
    {
        if (false === isset($this->searchPattern)) {
            throw new InvalidArgumentException(
                'The search pattern of `' . static::class . '` has not been configured.'
            );
        }

        return $this->searchPattern;
    }

    /**
     * Returns the replacement pattern for this rule.
     *
     * @throws InvalidArgumentException when the pattern has not been configured
     */
    public function getReplacePattern(): string
    {
        if (false === isset($this->replacePattern)) {
            throw new InvalidArgumentException(
                'The replacement pattern of `' . static::class . '` has not been configured.'
            );
        }

        return $this->replacePattern;
    }

    /**
     * Returns the fixed input content.
     */
    public function getContentFixed(string $content): string
    {
        $this->assertPatternsAreUsable();

        if (false === mb_check_encoding($content, 'UTF-8')) {
            return $content;
        }

        $doesContentContainHtml = StringHelper::doesStringContainHtml($content);

        if (false === $doesContentContainHtml) {
            $contentFixed = preg_replace(
                $this->getSearchPattern(),
                $this->getReplacePattern(),
                $content
            );

            if (null === $contentFixed) {
                return $content;
            }

            return $contentFixed;
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

        return $this->restoreEntitiesInsertedByRules(implode('', $childNodesHtml));
    }

    /**
     * Rules may insert literal HTML entities like `&shy;` into text nodes.
     * The HTML serializer escapes their ampersand, so those entities have to be
     * restored. Entities that were part of the original content are serialized
     * escaped only once and therefore stay untouched.
     */
    private function restoreEntitiesInsertedByRules(string $html): string
    {
        return (string) preg_replace(
            '/&amp;((?:#[0-9]+|#[xX][0-9a-fA-F]+|[a-zA-Z][a-zA-Z0-9]+);)/',
            '&$1',
            $html
        );
    }

    /**
     * @throws InvalidArgumentException when one of the patterns is missing or not a valid regex
     */
    private function assertPatternsAreUsable(): void
    {
        $searchPattern = $this->getSearchPattern();
        $this->getReplacePattern();

        set_error_handler(static fn (): bool => true);

        try {
            $isValidPattern = false !== preg_match($searchPattern, '');
        } finally {
            restore_error_handler();
        }

        if (false === $isValidPattern) {
            throw new InvalidArgumentException(
                'The search pattern `' . $searchPattern . '` of `' . static::class . '` is not a valid regular expression.'
            );
        }
    }

    /**
     * Returns the byte offset of the given (extracted) content within the original content.
     *
     * The extracted content is searched forward from the given cursor, as the
     * extracted parts are handed over in document order.
     */
    private function findOffsetInContent(string $content, string $contentExtracted, int $cursor): int
    {
        if ('' === $contentExtracted) {
            return $cursor;
        }

        $offset = strpos($content, $contentExtracted, $cursor);

        if (false === $offset) {
            $offset = strpos($content, $contentExtracted);
        }

        if (false === $offset) {
            /**
             * The extracted content is not part of the original content anymore,
             * for example because entities have been decoded by the DOM.
             */
            return max(0, strlen($content) - strlen($contentExtracted));
        }

        return $offset;
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
                    $value = $child->nodeValue;

                    /**
                     * Text nodes that only contain whitespace are pure indentation
                     * between tags. They must not be processed, otherwise the
                     * indentation of the document would be removed.
                     */
                    if ('' === $value || null === $value || '' === trim($value)) {
                        continue;
                    }

                    $value = $callback($value);
                    $child->nodeValue = $value;
                }
            }
        };

        $node = $domDocument->getElementsByTagName('temp')->item(0);

        if (null === $node) {
            return;
        }

        $traverse($node);
    }

    private function convertByteOffsetToCharOffset(string $string, int $byteOffset, string $encoding = 'UTF-8'): int
    {
        return mb_strlen(
            substr($string, 0, $byteOffset),
            $encoding
        );
    }

    public function preferHtmlOverUtf8Characters(): self
    {
        return $this;
    }

    public function preferUtf8OverHtmlCharacters(): self
    {
        return $this;
    }
}
