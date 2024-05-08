# Rules documentation

There are currently 40 rules available.

## TOC

-   [`AddNonBreakingSpaceAfterDoctorRule`](#addnonbreakingspaceafterdoctorrule)
-   [`AddNonBreakingSpaceAfterProfessorRule`](#addnonbreakingspaceafterprofessorrule)
-   [`AddNonBreakingSpaceBeforeColonRule`](#addnonbreakingspacebeforecolonrule)
-   [`AddNonBreakingSpaceBeforeExclamationMarkRule`](#addnonbreakingspacebeforeexclamationmarkrule)
-   [`AddNonBreakingSpaceBeforeQuestionMarkRule`](#addnonbreakingspacebeforequestionmarkrule)
-   [`AddNonBreakingSpaceBeforeSemicolonRule`](#addnonbreakingspacebeforesemicolonrule)
-   [`AddNonBreakingSpaceBeforeUhrRule`](#addnonbreakingspacebeforeuhrrule)
-   [`AddNonBreakingSpaceBetweenEingetragenerAndVereinRule`](#addnonbreakingspacebetweeneingetragenerandvereinrule)
-   [`AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule`](#addnonbreakingspacebetweenguillemetleftopenandwordrule)
-   [`AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule`](#addnonbreakingspacebetweenguillemetrightcloseandwordrule)
-   [`AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule`](#addnonbreakingspacebetweenguillemetsingleleftopenandwordrule)
-   [`AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule`](#addnonbreakingspacebetweenguillemetsinglerightcloseandwordrule)
-   [`AddNonBreakingSpaceBetweenNumberAndJahrRule`](#addnonbreakingspacebetweennumberandjahrrule)
-   [`AddNonBreakingSpaceBetweenNumberAndUnitRule`](#addnonbreakingspacebetweennumberandunitrule)
-   [`AddSoftHyphenBetweenDashSeparatedWordsRule`](#addsofthyphenbetweendashseparatedwordsrule)
-   [`AddSoftHyphenToWordRule`](#addsofthyphentowordrule)
-   [`AddSpaceBehindDotRule`](#addspacebehinddotrule)
-   [`AddSpaceBehindExclamationMarkRule`](#addspacebehindexclamationmarkrule)
-   [`AddSpaceBehindQuestionMarkRule`](#addspacebehindquestionmarkrule)
-   [`AddSpaceBetweenBracketsRule`](#addspacebetweenbracketsrule)
-   [`BindNumberToNumberRule`](#bindnumbertonumberrule)
-   [`BindWordAfterColonRule`](#bindwordaftercolonrule)
-   [`BindWordAfterCommaRule`](#bindwordaftercommarule)
-   [`BindWordAfterDotRule`](#bindwordafterdotrule)
-   [`BindWordAfterExclamationMarkRule`](#bindwordafterexclamationmarkrule)
-   [`BindWordAfterQuestionMarkRule`](#bindwordafterquestionmarkrule)
-   [`BindWordAfterSemicolonRule`](#bindwordaftersemicolonrule)
-   [`ConvertCharactersToAtCharRule`](#convertcharacterstoatcharrule)
-   [`ConvertCharactersToCopyrightCharRule`](#convertcharacterstocopyrightcharrule)
-   [`ConvertCharactersToRegisteredCharRule`](#convertcharacterstoregisteredcharrule)
-   [`ConvertCharactersToTrademarkCharRule`](#convertcharacterstotrademarkcharrule)
-   [`ConvertDashToEmDashRule`](#convertdashtoemdashrule)
-   [`ConvertDashToEnDashRule`](#convertdashtoendashrule)
-   [`ConvertDotsToEllipsisRule`](#convertdotstoellipsisrule)
-   [`ConvertSpacesBetweenTimesAndNumbersRule`](#convertspacesbetweentimesandnumbersrule)
-   [`ConvertXToTimesBetweenNumbersRule`](#convertxtotimesbetweennumbersrule)
-   [`RemoveDuplicatedWhitespaceRule`](#removeduplicatedwhitespacerule)
-   [`RemoveSpaceBeforeCommaRule`](#removespacebeforecommarule)
-   [`RemoveUnnecessaryExclamationMarksRule`](#removeunnecessaryexclamationmarksrule)
-   [`RemoveUnnecessaryQuestionMarksRule`](#removeunnecessaryquestionmarksrule)

## Rules

### `AddNonBreakingSpaceAfterDoctorRule`

#### Description

Add a non breaking space after `Dr.`. This binds the title and the name together and makes it *easier to read*.

#### Transformation example

-   With a thin non breaking space (`\xE2\x80\xAF`):

    ```diff
    - Dr. Max Mustermann
    + Dr.\xE2\x80\xAFMax Mustermann
    ```

-   With a non breaking space for html (`&nbsp;`):

    ```diff
    - Dr. Max Mustermann
    + Dr.&nbsp;Max Mustermann
    ```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceAfterDoctorRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceAfterDoctorRule.php](../src/Rule/AddNonBreakingSpaceAfterDoctorRule.php)

----

### `AddNonBreakingSpaceAfterProfessorRule`

#### Description

Add a non breaking space after `Prof.`. This binds the title and the name together and makes it *easier to read*.

#### Transformation example

-   With a thin non breaking space (`\xE2\x80\xAF`):

    ```diff
    - Prof. Max Mustermann
    + Prof.\xE2\x80\xAFMax Mustermann
    ```

-   With a non breaking space for html (`&nbsp;`):

    ```diff
    - Prof. Max Mustermann
    + Prof.&nbsp;Max Mustermann
    ```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceAfterProfessorRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceAfterProfessorRule.php](../src/Rule/AddNonBreakingSpaceAfterProfessorRule.php)

----

### `AddNonBreakingSpaceBeforeColonRule`

#### Description

Add a non breaking space between before a colon to disallow separating it from the word before.

#### Transformation example

```diff
- Concept, création et réalisation technique : Bit&Black
+ Concept, création et réalisation technique\xE2\x80\xAF: Bit&Black
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBeforeColonRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBeforeColonRule.php](../src/Rule/AddNonBreakingSpaceBeforeColonRule.php)

----

### `AddNonBreakingSpaceBeforeExclamationMarkRule`

#### Description

Add a non breaking space between before a exclamation mark to disallow separating it from the word before.

#### Transformation example

```diff
- On y va !
+ On y va\xE2\x80\xAF!
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBeforeExclamationMarkRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBeforeExclamationMarkRule.php](../src/Rule/AddNonBreakingSpaceBeforeExclamationMarkRule.php)

----

### `AddNonBreakingSpaceBeforeQuestionMarkRule`

#### Description

Add a non breaking space between before a question mark to disallow separating it from the word before.

#### Transformation example

```diff
- On y va ?
+ On y va\xE2\x80\xAF?
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBeforeQuestionMarkRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBeforeQuestionMarkRule.php](../src/Rule/AddNonBreakingSpaceBeforeQuestionMarkRule.php)

----

### `AddNonBreakingSpaceBeforeSemicolonRule`

#### Description

Add a non breaking space between before a semicolon to disallow separating it from the word before.

#### Transformation example

```diff
- Concept, création et réalisation technique : Bit&Black
+ Concept, création et réalisation technique\xE2\x80\xAF: Bit&Black
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBeforeSemicolonRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBeforeSemicolonRule.php](../src/Rule/AddNonBreakingSpaceBeforeSemicolonRule.php)

----

### `AddNonBreakingSpaceBeforeUhrRule`

#### Description

Add a non breaking space before the word `Uhr` to disallow separating it from the time before.

#### Transformation example

```diff
- Es ist 12.30 Uhr.
+ Es ist 12.30\xC2\xA0Uhr.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $addNonBreakingSpaceBeforeUhrRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBeforeUhrRule.php](../src/Rule/AddNonBreakingSpaceBeforeUhrRule.php)

----

### `AddNonBreakingSpaceBetweenEingetragenerAndVereinRule`

#### Description

Add a non breaking space between between `e.` and `V.` to disallow separating those two.

#### Transformation example

```diff
- Supersport 500 e.V.
+ Supersport 500 e.\xC2\xA0V.
```

```diff
- Supersport 500 e. V.
+ Supersport 500 e.\xC2\xA0V.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenEingetragenerAndVereinRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenEingetragenerAndVereinRule.php](../src/Rule/AddNonBreakingSpaceBetweenEingetragenerAndVereinRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule`

#### Description

Add a thin non breaking space between between a left angle quote `«` and a word **after** to disallow separating those two.

#### Transformation example

```diff
- J'ai dit « non » à toi.
+ J'ai dit «\xE2\x80\xAFnon » à toi.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule.php](../src/Rule/AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule`

#### Description

Add a thin non breaking space between between a right angle quote `»` and a word **before** to disallow separating those two.

#### Transformation example

```diff
- J'ai dit « non » à toi.
+ J'ai dit « non\xE2\x80\xAF» à toi.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule.php](../src/Rule/AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule`

#### Description

Add a thin non breaking space between between a single left angle quote `‹` and a word **after** to disallow separating those two.

#### Transformation example

```diff
- Je t'ai dit « non », car « tout à l'heure, tu m'as dit ‹ oui › ».
+ Je t'ai dit « non », car « tout à l'heure, tu m'as dit ‹\xE2\x80\xAFoui › ».
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule.php](../src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule`

#### Description

Add a thin non breaking space between between a single right angle quote `›` and a word **before** to disallow separating those two.

#### Transformation example

```diff
- Je t'ai dit « non », car « tout à l'heure, tu m'as dit ‹ oui › ».
+ Je t'ai dit « non », car « tout à l'heure, tu m'as dit ‹ oui\xE2\x80\xAF› ».
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule.php](../src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenNumberAndJahrRule`

#### Description

Add a non breaking space between between `Jahr` and the number before to disallow separating those two.

#### Transformation example

```diff
- Vor 30 Jahren
+ Vor 30\xC2\xA0Jahren
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenNumberAndJahrRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenNumberAndJahrRule.php](../src/Rule/AddNonBreakingSpaceBetweenNumberAndJahrRule.php)

----

### `AddNonBreakingSpaceBetweenNumberAndUnitRule`

#### Description

Add a thin non breaking space between between a number and the following unit to disallow separating those two.

#### Transformation example

```diff
- 200 ° C
+ 200\xE2\x80\xAF° C
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a thin non breaking space will be used.

    ```php
    $addNonBreakingSpaceBetweenNumberAndUnitRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/AddNonBreakingSpaceBetweenNumberAndUnitRule.php](../src/Rule/AddNonBreakingSpaceBetweenNumberAndUnitRule.php)

----

### `AddSoftHyphenBetweenDashSeparatedWordsRule`

#### Description

Add a non breaking space between between to words that have a dash between `/` to **allow** separating those two. This can improve the text wrap when having long words-

#### Transformation example

```diff
- Von Paris/Frankreich nach Stuttgart/Deutschland.
+ Von Paris/\xC2\xADFrankreich nach Stuttgart/\xC2\xADDeutschland.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/AddSoftHyphenBetweenDashSeparatedWordsRule.php](../src/Rule/AddSoftHyphenBetweenDashSeparatedWordsRule.php)

----

### `AddSoftHyphenToWordRule`

#### Description

Add a soft hyphen to words to allow hyphenation. This can make the typeface appear calmer and leads to better utilisation of the available type width.

#### Transformation example

```diff
- Bodensee
+ Boden\xC2\xADsee
```

#### Possible rule customization

There are 5 possibilities to customize this rule:

-   Define the language code.

    ```php
    $addSoftHyphenToWordRule->setLanguageCode($languageCode);
    ```

-   Define the hyphenation character.

    ```php
    $addSoftHyphenToWordRule->setHyphen($hyphen);
    ```

-   Define, how many characters a word must have before the first hyphen may appear.

    ```php
    $addSoftHyphenToWordRule->setMinCharacterCountBefore($minCharacterCountBefore);
    ```

-   Define, how many characters a word must have after the last hyphen.

    ```php
    $addSoftHyphenToWordRule->setMinCharacterCountAfter($minCharacterCountAfter);
    ```

-   Define the minimum length a word must have to be hyphenated.

    ```php
    $addSoftHyphenToWordRule->setMinWordCharacterCount($minWordCharacterCount);
    ```

#### File

This class is located under [../src/Rule/AddSoftHyphenToWordRule.php](../src/Rule/AddSoftHyphenToWordRule.php)

----

### `AddSpaceBehindDotRule`

#### Description

Add a missing space behind a dot `.`.

#### Transformation example

```diff
- Ganz am Ende.Wie geht's weiter.
+ Ganz am Ende. Wie geht's weiter.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/AddSpaceBehindDotRule.php](../src/Rule/AddSpaceBehindDotRule.php)

----

### `AddSpaceBehindExclamationMarkRule`

#### Description

Add a missing space behind an exclamation mark `!`.

#### Transformation example

```diff
- Ganz am Ende!Wie geht's weiter!
+ Ganz am Ende! Wie geht's weiter!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/AddSpaceBehindExclamationMarkRule.php](../src/Rule/AddSpaceBehindExclamationMarkRule.php)

----

### `AddSpaceBehindQuestionMarkRule`

#### Description

Add a missing space behind a question mark `?`.

#### Transformation example

```diff
- Ganz am Ende?Wie geht's weiter!
+ Ganz am Ende? Wie geht's weiter!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/AddSpaceBehindQuestionMarkRule.php](../src/Rule/AddSpaceBehindQuestionMarkRule.php)

----

### `AddSpaceBetweenBracketsRule`

#### Description

Add a hair space between brackets. The space will be added behind left (opening) brackets and before right (closing) brackets.

#### Transformation example

```diff
- Es geht los (warum auch immer)!
+ Es geht los (\xE2\x80\x8Awarum auch immer\xE2\x80\x8A)!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/AddSpaceBetweenBracketsRule.php](../src/Rule/AddSpaceBetweenBracketsRule.php)

----

### `BindNumberToNumberRule`

#### Description

Add a thin non breaking space between the words `Nr.` or `Nummer` and a following number to disallow separating them from each other.

#### Transformation example

```diff
- Das ist Nr. 8.
+ Das ist Nr.\xE2\x80\xAF8.
```

```diff
- Das ist Nummer 8.
+ Das ist Nummer\xE2\x80\xAF8.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/BindNumberToNumberRule.php](../src/Rule/BindNumberToNumberRule.php)

----

### `BindWordAfterColonRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a colon. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Glaube mir: es war so schön!
+ Glaube mir: es\xC2\xA0war so schön!
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterColonRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterColonRule.php](../src/Rule/BindWordAfterColonRule.php)

----

### `BindWordAfterCommaRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a comma. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Glaube mir, es war so schön!
+ Glaube mir, es\xC2\xA0war so schön!
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterCommaRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterCommaRule.php](../src/Rule/BindWordAfterCommaRule.php)

----

### `BindWordAfterDotRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a dot. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Schon vorbei. Von wegen!
+ Schon vorbei. Von\xC2\xA0wegen!
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterDotRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterDotRule.php](../src/Rule/BindWordAfterDotRule.php)

----

### `BindWordAfterExclamationMarkRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows an exclamation mark. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Sicher! Ich denke nicht.
+ Sicher! Ich\xC2\xA0denke nicht.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterExclamationMarkRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterExclamationMarkRule.php](../src/Rule/BindWordAfterExclamationMarkRule.php)

----

### `BindWordAfterQuestionMarkRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a question mark. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Sicher? Ich denke nicht.
+ Sicher? Ich\xC2\xA0denke nicht.
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterQuestionMarkRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterQuestionMarkRule.php](../src/Rule/BindWordAfterQuestionMarkRule.php)

----

### `BindWordAfterSemicolonRule`

#### Description

Replace a whitespace with a non breaking space between a short word and its following word if the short word follows a semicolon. This can improve the text wrap in ragged typesetting, as short words do not remain alone at the end of a line. **Attention**: This rule is only suitable for ragged text, not for justified text.

#### Transformation example

```diff
- Glaube mir; es war so schön!
+ Glaube mir; es\xC2\xA0war so schön!
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a non breaking space will be used.

    ```php
    $bindWordAfterSemicolonRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [../src/Rule/BindWordAfterSemicolonRule.php](../src/Rule/BindWordAfterSemicolonRule.php)

----

### `ConvertCharactersToAtCharRule`

#### Description

Convert the characters `(at)` into an `@` character.

#### Transformation example

```diff
- me(at)example.org
+ me@example.org
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertCharactersToAtCharRule.php](../src/Rule/ConvertCharactersToAtCharRule.php)

----

### `ConvertCharactersToCopyrightCharRule`

#### Description

Convert the characters `(c)` or `(C)` into an `©` character.

#### Transformation example

```diff
- (c) Bit&Black
+ © Bit&Black
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertCharactersToCopyrightCharRule.php](../src/Rule/ConvertCharactersToCopyrightCharRule.php)

----

### `ConvertCharactersToRegisteredCharRule`

#### Description

Convert the characters `(r)` or `(R)` into an `®` character.

#### Transformation example

```diff
- Apple(r)
+ Apple®
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertCharactersToRegisteredCharRule.php](../src/Rule/ConvertCharactersToRegisteredCharRule.php)

----

### `ConvertCharactersToTrademarkCharRule`

#### Description

Convert the characters `(tm)` or `(TM)` into an `™` character.

#### Transformation example

```diff
- Star Wars(tm)
+ Star Wars™
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertCharactersToTrademarkCharRule.php](../src/Rule/ConvertCharactersToTrademarkCharRule.php)

----

### `ConvertDashToEmDashRule`

#### Description

Convert a dash `-` into an em dash `—` when there is whitespace before and after.

#### Transformation example

```diff
- And if so - I don't think so!
+ And if so — I don't think so!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertDashToEmDashRule.php](../src/Rule/ConvertDashToEmDashRule.php)

----

### `ConvertDashToEnDashRule`

#### Description

Convert a dash `-` into an en dash `–` when there is whitespace before and after.

#### Transformation example

```diff
- Und wenn schon - ich glaube nicht!
+ Und wenn schon – ich glaube nicht!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertDashToEnDashRule.php](../src/Rule/ConvertDashToEnDashRule.php)

----

### `ConvertDotsToEllipsisRule`

#### Description

Convert three or more dots `...` into an ellipsis character `…`.

#### Transformation example

```diff
- Ich weiß nicht...
+ Ich weiß nicht…
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertDotsToEllipsisRule.php](../src/Rule/ConvertDotsToEllipsisRule.php)

----

### `ConvertSpacesBetweenTimesAndNumbersRule`

#### Description

Recognises a measurement and inserts thin non breaking spaces before and after the multiplication mark `x` or `×`.

#### Transformation example

```diff
- Format: 15 x 9 cm.
+ Format: 15\xE2\x80\xAFx\xE2\x80\xAF9 cm.
```

```diff
- Format: 15 × 9 cm.
+ Format: 15\xE2\x80\xAF×\xE2\x80\xAF9 cm.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertSpacesBetweenTimesAndNumbersRule.php](../src/Rule/ConvertSpacesBetweenTimesAndNumbersRule.php)

----

### `ConvertXToTimesBetweenNumbersRule`

#### Description

Convert a `x` character into a multiplication sign `×`, when a measurement has been recognised.

#### Transformation example

```diff
- Format: 15 x 9 cm.
+ Format: 15 × 9 cm.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/ConvertXToTimesBetweenNumbersRule.php](../src/Rule/ConvertXToTimesBetweenNumbersRule.php)

----

### `RemoveDuplicatedWhitespaceRule`

#### Description

Remove duplicated whitespace with a single space character.

#### Transformation example

```diff
- Ganz am      Ende.
+ Ganz am Ende.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/RemoveDuplicatedWhitespaceRule.php](../src/Rule/RemoveDuplicatedWhitespaceRule.php)

----

### `RemoveSpaceBeforeCommaRule`

#### Description

Remove whitespace before a comma.

#### Transformation example

```diff
- Wir glauben , dass das Sinn macht.
+ Wir glauben, dass das Sinn macht.
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/RemoveSpaceBeforeCommaRule.php](../src/Rule/RemoveSpaceBeforeCommaRule.php)

----

### `RemoveUnnecessaryExclamationMarksRule`

#### Description

Remove duplicated exclamation marks.

#### Transformation example

```diff
- Nein! Nein!! Nein!!! Nein!!!!
+ Nein! Nein!! Nein!! Nein!!
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/RemoveUnnecessaryExclamationMarksRule.php](../src/Rule/RemoveUnnecessaryExclamationMarksRule.php)

----

### `RemoveUnnecessaryQuestionMarksRule`

#### Description

Remove duplicated exclamation marks.

#### Transformation example

```diff
- Nein? Nein?? Nein??? Nein????
+ Nein? Nein?? Nein?? Nein??
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [../src/Rule/RemoveUnnecessaryQuestionMarksRule.php](../src/Rule/RemoveUnnecessaryQuestionMarksRule.php)

----

