# Dutch address parser

Dutch address parser is a library to parse address lines into the segments `street`, `number` and `suffix`.

![packagist](https://img.shields.io/packagist/v/NoxxieNl/Nladdresslexer) ![version](https://img.shields.io/github/v/release/noxxienl/nladdresslexer)

Example:
`Plein 1926 12 A`

Will be parsed to:

|Street|Number|Suffix|
|--|---|--|
|Plein 1926|12|A

## Installation

Composer is used to install this package

```bash
composer require noxxienl/nladdressparser
```

## Usage

```php
use Noxxienl\Nladdresslexer\AddressParser;

$parser = new AddressParser;
$parser->evaluate('Plein 1926 12 A');

echo $parser->getStreet() . "\r\n"; // Plein 1926
echo $parser->getNumber() . "\r\n"; // 12
echo $parser->getSuffix() . "\r\n"; // A

echo $parser->getOriginalString();
```

## Usage with splitting address

Sometimes you may have address that does not have the format `street`, `number` & `suffix`. To let the parser correctly do its work you need to split the string on your own before the parser can do its work.

For example:
`50 A, Ringweg Zuid / Rijksweg A20`

```php
use Noxxienl\Nladdresslexer\AddressParser;

$parser = new AddressParser;

list($number, $street) = explode(', ', '50 A, Ringweg Zuid / Rijksweg A20');
$parser->evaluate($street, $number);

echo $parser->getStreet() . "\r\n"; // Ringweg Zuid / Rijgsweg A20
echo $parser->getNumber() . "\r\n"; // 50
echo $parser->getSuffix() . "\r\n"; // A

echo $parser->getOriginalString();
```

## Usage for splitting only numbers
Sometimes you may wish to split only the `number` and `suffix`. You can do so by setting the formatting of the parser to the following before executing the parsing:
```php
AddressParser::setAddressFormat([
    AddressParser::T_NUMBER,
    AddressParser::T_SUFFIX,
]);
```

**Be carefull**: When setting the address format, it is changed for every parsing to beyond that point. Reset the format to its original
state when you want to parse a full address:

```php
AddressParser::setAddressFormat([
    AddressParset::T_STREET,
    AddressParser::T_NUMBER,
    AddressParser::T_SUFFIX,
]);
```

## Testing

Testing is done using `pestphp`. (https://pestphp.com/)

```bash
./vendor/bin/pest
```

To run the tests.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Bugs
Submit a issue to the github repository and if you can find the fix be sure to also submit a pull request!

## License
[MIT](https://choosealicense.com/licenses/mit/)