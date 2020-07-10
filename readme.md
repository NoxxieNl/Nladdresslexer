# Dutch address parser

Dutch address parser is a library to parse address lines into the segments `street`, `number` and `affix`.

Example:

`Plein 1926 12 A`

Will be parsed to:

|Street|Nubmer|Affix|
|--|---|--|
|Plein 1926|12|A

## Installation

Composer is used to install this package

```bash
composer require "NoxxieNl\Nladdressparser"
```

## Usage

```php
use Noxxienl\Nladdresslexer\AddressParser;
use NoxxieNl\Nladdresslexer\CharacterTypeLexer;

$parser = new AddressParser();

$parser->evaluate('Plein 1926 12 A');

echo $parser->getStreet() . "\r\n";
echo $parser->getNumber() . "\r\n";
echo $parser->getAffix() . "\r\n";

echo $parser->getOriginalString();
```

## Testing

Testing is done using `pest`.

```bash
./vendor/bin/pest
```

To run the tests.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)