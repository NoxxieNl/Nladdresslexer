<?php
use Noxxienl\Nladdresslexer\AddressParser;

$addresses = [
    '12, stationstraat' => [
        'street' => null,
        'number' => '12',
        'suffix' => 'stationstraat',
    ],

    '61, Plein 1926 A' => [
        'street' => null,
        'number' => '61',
        'suffix' => 'Plein1926 A'
    ],

    '123 Main Street Smallville, Idaho 12345' => [
        'street' => null,
        'number' => '123',
        'suffix' => 'Main Street SmallvilleIdaho12345',
    ],

    '118 rue Marguerite' => [
        'street' => null,
        'number' => '118',
        'suffix' => 'rue Marguerite',
    ]
];

// Set correct address format.
AddressParser::setAddressFormat([
    AddressParser::T_STREET,
    AddressParser::T_NUMBER,
    AddressParser::T_SUFFIX,
]);

$parser = new AddressParser;
foreach ($addresses as $address => $evaluated) {

    /** @method TestCall|TestCase|mixed it(string $description, Closure $closure = null) */
    it('cannot parse address "'.$address.'"', function() use ($address, $evaluated, $parser) {  
        $parser->evaluate($address);

        $this->assertEquals($evaluated['street'], $parser->getStreet());
        $this->assertEquals($evaluated['number'], $parser->getNumber());
        $this->assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('invalid_address_notations');
}