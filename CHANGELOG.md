# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.24.0 – 2026-10-07

### Added

- Missing or invalid patterns now throw an `InvalidArgumentException` instead of
  silently deleting content (`CustomRule` and any other rule without a usable
  search/replacement pattern).
- HTML output keeps the entities inserted by rules (`&#8239;`, `&shy;`, `&nbsp;`)
  intact, while entities that were part of the original content stay escaped.
- Tests pinning the documented behavior (regressions, DOM handling, diffs,
  character-based positions, examples) were added.

### Changed

- Violation positions are now **character-based** instead of byte-based, both in
  plain text and inside HTML documents. Previews therefore show the correct
  context around a violation.
- Input that is not valid UTF-8 is left untouched: `getViolations()` returns no
  violations and `getContentFixed()` returns the content unchanged.
  Previously a rule with a `u`-modified pattern could destroy the whole content
  (`getContentFixed()` returning an empty string), and the HTML path silently
  converted invalid bytes into `?`.
- Whitespace-only text nodes in HTML documents are no longer processed, so the
  indentation between tags is preserved.
- The check that decides between plain-text and HTML processing no longer treats
  expressions like `a < b && c > d` or `Map<string, int>` as HTML.

### Fixed

- Character-class alternations built from `CharactersEnum::getAllSpacesRegex()`
  and `getAllQuotesRegex()` matched the literal characters of the
  `&nbsp;`/`&#8239;`/quote alternatives (e.g. `&`, `n`, `b`, `s`, `p`). Around 30
  rules matched unintended text and could corrupt or delete content.
- Word-boundary rules now handle words containing non-ASCII characters
  (`café!`, `café?`, `café : bon`, `café ; bon`, `café & thé`, `café + thé`)
  instead of silently doing nothing.
- `AddSoftHyphenToWordRule` hyphenates complete Unicode words
  (`Wörter-buch-ver-zeichnis`) instead of only the ASCII part of the word.
- Rules that must not touch line breaks (dash conversion, comma/`!`/`?`/colon/
  semicolon spacing, binding of the last-and-penultimate word) no longer convert
  a line break into a (non-breaking) space.
- `AddSpaceBetweenBracketsRule` used a malformed character class (`\^]`) and did
  not insert spaces before closing `]` brackets.
- Quote-conversion rules now apply the `u` modifier so UTF-8 quotes are handled
  correctly.
- `CharacterDiff` compares characters instead of raw bytes.
- Documentation examples were corrected (semicolon example, `&#8239;` for thin
  spaces, valid UTF-8 escape `\xE2\x80\xAF`).

## [0.23.2] - 2026-07-21

### Changed

- Improvements to a rule.

## [0.23.1] - 2026-07-21

### Fixed

- Fixed a rule.

## [0.23.0] - 2026-07-17

### Changed

- Improvements to a rule.

## [0.22.4] - 2026-07-17

### Fixed

- Fixed several rules.

### Changed

- Improved documentation.

## [0.22.3] - 2026-07-16

### Fixed

- Fixed a rule.

## [0.22.2] - 2026-07-16

### Fixed

- Fixed several rules.

## [0.22.1] - 2026-07-14

### Fixed

- Fixed a rule.

## [0.22.0] - 2026-07-14

### Added

- A new rule.

## [0.21.0] - 2026-07-14

### Added

- Two new rules.

### Changed

- Refactored internals.

## 0.3.0 – 0.20.6

Releases before this changelog was introduced are not itemized here. See the
[latest release](https://github.com/BitAndBlack/typorules/releases) and the list
of [tags](https://github.com/BitAndBlack/typorules/tags) for details.

[Unreleased]: https://github.com/BitAndBlack/typorules/compare/0.23.2...HEAD
[0.23.2]: https://github.com/BitAndBlack/typorules/compare/0.23.1...0.23.2
[0.23.1]: https://github.com/BitAndBlack/typorules/compare/0.23.0...0.23.1
[0.23.0]: https://github.com/BitAndBlack/typorules/compare/0.22.4...0.23.0
[0.22.4]: https://github.com/BitAndBlack/typorules/compare/0.22.3...0.22.4
[0.22.3]: https://github.com/BitAndBlack/typorules/compare/0.22.2...0.22.3
[0.22.2]: https://github.com/BitAndBlack/typorules/compare/0.22.1...0.22.2
[0.22.1]: https://github.com/BitAndBlack/typorules/compare/0.22.0...0.22.1
[0.22.0]: https://github.com/BitAndBlack/typorules/compare/0.21.0...0.22.0
[0.21.0]: https://github.com/BitAndBlack/typorules/compare/0.20.6...0.21.0