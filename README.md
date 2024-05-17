[![PHP from Packagist](https://img.shields.io/packagist/php-v/bitandblack/typorules)](http://www.php.net)
[![Latest Stable Version](https://poser.pugx.org/bitandblack/typorules/v/stable)](https://packagist.org/packages/bitandblack/typorules)
[![Total Downloads](https://poser.pugx.org/bitandblack/typorules/downloads)](https://packagist.org/packages/bitandblack/typorules)
[![License](https://poser.pugx.org/bitandblack/typorules/license)](https://packagist.org/packages/bitandblack/typorules)

# Bit&Black TypoRules

Typographic improvements for professional-looking and easy-to-read texts written in PHP.

## TOC

-   [Installation](#installation)
-   [Usage](#usage)
    -   [Using a single rule](#using-a-single-rule)
    -   [Using a rule set](#using-a-rule-set)
-   [Rules existing](#rules-existing)
-   [Rule sets existing](#rule-sets-existing)
    -   [Customization](#customization)
-   [Display and check changes](#display-and-check-changes)
-   [Thanks](#thanks)
-   [Help](#help)

## Installation

This library is available for the use with [Composer](https://packagist.org/packages/bitandblack/typorules). Add it to your project by running `$ composer require bitandblack/typorules`.

## Usage

The Bit&Black TypoRules library comes with a lot of rules that help achieve a better typography. In addition, there are rule sets providing multiple rules at once. 

### Using a single rule

A single rule can be used like that:

```php
<?php

use BitAndBlack\TypoRules\Rule\RemoveDuplicatedWhitespaceRule;

$content = 'This is  my    sentence.';

$removeDuplicatedWhitespaceRule = new RemoveDuplicatedWhitespaceRule();

/**
 * This will return a list of all violations, that have been found. 
 * You can use this for more control or an interactive process.
 */
$violations = $removeDuplicatedWhitespaceRule->getViolations($content);

/**
 * This method will return the fixed content. In our example:
 * `This is my sentence.`
 */
$contentFixed = $removeDuplicatedWhitespaceRule->getContentFixed($content);
```

You can find a similar example under [`/examples/example1.php`](./examples/example1.php).

### Using a rule set

Using a rule set may look like that:

````php
<?php

use BitAndBlack\TypoRules\RuleSet\EnglishRuleSet;

$content = 'This is  my    - terribly - formatted sentence!!!!!';

$englishRuleSet = new EnglishRuleSet();

/**
 * This will return a list of all violations, that have been found.
 * You can use this for more control or an interactive process.
 */
$violations = $englishRuleSet->getViolations($content);

/**
 * This method will return the fixed content. In our example:
 * `This is my — terribly — formatted sentence!!`
 */
$contentFixed = $englishRuleSet->getContentFixed($content);
````

You can find a similar example under [`/examples/example2.php`](./examples/example2.php).

## Rules existing

Read more about the existing rules under [/docs/rules.md](./docs/rules.md).

You can add custom rules by implementing the [`RuleInterface`](./src/Rule/RuleInterface.php).

## Rule sets existing

Read more about the existing rule ses under [/docs/rulesets.md](./docs/rulesets.md).

You can use custom rule sets by implementing the [`RuleSetInterface`](./src/RuleSet/RuleSetInterface.php).

### Customization

You can customize rule sets and add or remove rules by using the `withRule` or `withoutRule` methods.

If you want to set up a rule set completely by your own, you can use the [`CustomRuleSet`](./src/RuleSet/CustomRuleSet.php) class.

## Display and check changes

Every rule returns a list of violations, and every violation may tell about the exact position of the violation found. 

However, in some cases, you probably want to create an exact diff view. This can be done using the [`CharacterDiff`](./src/Diff/CharacterDiff.php) class. This may look like here:

```php
<?php

use BitAndBlack\TypoRules\Diff\CharacterDiff;

$content = 'Content before';
$contentFixed = 'Content, that has been fixed';

$diff = CharacterDiff::create()->getDiff($content, $contentFixed);
```

The [`CharacterDiff`](./src/Diff/CharacterDiff.php) class can be initialized with the [`CliOutput`](./src/Diff/Output/CliOutput.php) or the [`HtmlOutput`](./src/Diff/Output/HtmlOutput.php) class, and will decide the output format by itself if you don't set up one of those.

## Thanks

Our thanking goes to the contributors of [JoliTypo](https://github.com/jolicode/JoliTypo), that have inspired our development of this library.

## Help

If you have any questions, feel free to contact us under `hello@bitandblack.com`.

Further information about Bit&Black can be found under [www.bitandblack.com](https://www.bitandblack.com).
