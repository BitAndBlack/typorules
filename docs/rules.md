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

```diff
- Dr. Max Mustermann
+ Dr. Max Mustermann
```

#### Possible rule customization

There is 1 possibility to customize this rule:

-   Configure the type of the space. Per default, a small non breaking space will be used.

    ```php
    $addNonBreakingSpaceAfterDoctorRule->setNonBreakingSpace($nonBreakingSpace);
    ```

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceAfterDoctorRule.php](./src/Rule/AddNonBreakingSpaceAfterDoctorRule.php)

----

### `AddNonBreakingSpaceAfterProfessorRule`

#### Description

Add a non breaking space after `Prof.`. This binds the title and the name together and makes it *easier to read*.

#### Transformation example

```diff
- Prof. Max Mustermann
+ Prof. Max Mustermann
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceAfterProfessorRule.php](./src/Rule/AddNonBreakingSpaceAfterProfessorRule.php)

----

### `AddNonBreakingSpaceBeforeColonRule`

#### Description

Add a non breaking space between before a colon to disallow separating it from the word before.

#### Transformation example

```diff
- Concept, création et réalisation technique : Bit&Black
+ Concept, création et réalisation technique : Bit&Black
```

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBeforeColonRule.php](./src/Rule/AddNonBreakingSpaceBeforeColonRule.php)

----

### `AddNonBreakingSpaceBeforeExclamationMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBeforeExclamationMarkRule.php](./src/Rule/AddNonBreakingSpaceBeforeExclamationMarkRule.php)

----

### `AddNonBreakingSpaceBeforeQuestionMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBeforeQuestionMarkRule.php](./src/Rule/AddNonBreakingSpaceBeforeQuestionMarkRule.php)

----

### `AddNonBreakingSpaceBeforeSemicolonRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBeforeSemicolonRule.php](./src/Rule/AddNonBreakingSpaceBeforeSemicolonRule.php)

----

### `AddNonBreakingSpaceBeforeUhrRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBeforeUhrRule.php](./src/Rule/AddNonBreakingSpaceBeforeUhrRule.php)

----

### `AddNonBreakingSpaceBetweenEingetragenerAndVereinRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenEingetragenerAndVereinRule.php](./src/Rule/AddNonBreakingSpaceBetweenEingetragenerAndVereinRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule.php](./src/Rule/AddNonBreakingSpaceBetweenGuillemetLeftOpenAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule.php](./src/Rule/AddNonBreakingSpaceBetweenGuillemetRightCloseAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule.php](./src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleLeftOpenAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule.php](./src/Rule/AddNonBreakingSpaceBetweenGuillemetSingleRightCloseAndWordRule.php)

----

### `AddNonBreakingSpaceBetweenNumberAndJahrRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenNumberAndJahrRule.php](./src/Rule/AddNonBreakingSpaceBetweenNumberAndJahrRule.php)

----

### `AddNonBreakingSpaceBetweenNumberAndUnitRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddNonBreakingSpaceBetweenNumberAndUnitRule.php](./src/Rule/AddNonBreakingSpaceBetweenNumberAndUnitRule.php)

----

### `AddSoftHyphenBetweenDashSeparatedWordsRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddSoftHyphenBetweenDashSeparatedWordsRule.php](./src/Rule/AddSoftHyphenBetweenDashSeparatedWordsRule.php)

----

### `AddSoftHyphenToWordRule`

#### Description

Add a soft hyphen to words to allow hyphenation. This can make the typeface appear calmer and leads to better utilisation of the available type width.

#### Transformation example

```diff
- Bodensee
+ Boden­see
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

This class is located under [./src/Rule/AddSoftHyphenToWordRule.php](./src/Rule/AddSoftHyphenToWordRule.php)

----

### `AddSpaceBehindDotRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddSpaceBehindDotRule.php](./src/Rule/AddSpaceBehindDotRule.php)

----

### `AddSpaceBehindExclamationMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddSpaceBehindExclamationMarkRule.php](./src/Rule/AddSpaceBehindExclamationMarkRule.php)

----

### `AddSpaceBehindQuestionMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddSpaceBehindQuestionMarkRule.php](./src/Rule/AddSpaceBehindQuestionMarkRule.php)

----

### `AddSpaceBetweenBracketsRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/AddSpaceBetweenBracketsRule.php](./src/Rule/AddSpaceBetweenBracketsRule.php)

----

### `BindNumberToNumberRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindNumberToNumberRule.php](./src/Rule/BindNumberToNumberRule.php)

----

### `BindWordAfterColonRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterColonRule.php](./src/Rule/BindWordAfterColonRule.php)

----

### `BindWordAfterCommaRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterCommaRule.php](./src/Rule/BindWordAfterCommaRule.php)

----

### `BindWordAfterDotRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterDotRule.php](./src/Rule/BindWordAfterDotRule.php)

----

### `BindWordAfterExclamationMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterExclamationMarkRule.php](./src/Rule/BindWordAfterExclamationMarkRule.php)

----

### `BindWordAfterQuestionMarkRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterQuestionMarkRule.php](./src/Rule/BindWordAfterQuestionMarkRule.php)

----

### `BindWordAfterSemicolonRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/BindWordAfterSemicolonRule.php](./src/Rule/BindWordAfterSemicolonRule.php)

----

### `ConvertCharactersToAtCharRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertCharactersToAtCharRule.php](./src/Rule/ConvertCharactersToAtCharRule.php)

----

### `ConvertCharactersToCopyrightCharRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertCharactersToCopyrightCharRule.php](./src/Rule/ConvertCharactersToCopyrightCharRule.php)

----

### `ConvertCharactersToRegisteredCharRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertCharactersToRegisteredCharRule.php](./src/Rule/ConvertCharactersToRegisteredCharRule.php)

----

### `ConvertCharactersToTrademarkCharRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertCharactersToTrademarkCharRule.php](./src/Rule/ConvertCharactersToTrademarkCharRule.php)

----

### `ConvertDashToEmDashRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertDashToEmDashRule.php](./src/Rule/ConvertDashToEmDashRule.php)

----

### `ConvertDashToEnDashRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertDashToEnDashRule.php](./src/Rule/ConvertDashToEnDashRule.php)

----

### `ConvertDotsToEllipsisRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertDotsToEllipsisRule.php](./src/Rule/ConvertDotsToEllipsisRule.php)

----

### `ConvertSpacesBetweenTimesAndNumbersRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertSpacesBetweenTimesAndNumbersRule.php](./src/Rule/ConvertSpacesBetweenTimesAndNumbersRule.php)

----

### `ConvertXToTimesBetweenNumbersRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/ConvertXToTimesBetweenNumbersRule.php](./src/Rule/ConvertXToTimesBetweenNumbersRule.php)

----

### `RemoveDuplicatedWhitespaceRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/RemoveDuplicatedWhitespaceRule.php](./src/Rule/RemoveDuplicatedWhitespaceRule.php)

----

### `RemoveSpaceBeforeCommaRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/RemoveSpaceBeforeCommaRule.php](./src/Rule/RemoveSpaceBeforeCommaRule.php)

----

### `RemoveUnnecessaryExclamationMarksRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/RemoveUnnecessaryExclamationMarksRule.php](./src/Rule/RemoveUnnecessaryExclamationMarksRule.php)

----

### `RemoveUnnecessaryQuestionMarksRule`

#### Description

No description provided.

#### Possible rule customization

This rule doesn't allow any customization.

#### File

This class is located under [./src/Rule/RemoveUnnecessaryQuestionMarksRule.php](./src/Rule/RemoveUnnecessaryQuestionMarksRule.php)

----

