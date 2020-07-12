<?php
use Noxxienl\Nladdresslexer\AddressParser;

$addresses = [
    '41, Stationstraat' => [
        'street' => 'Stationstraat',
        'number' => '41',
        'suffix' => null,
    ],
    
    '41 Stationstraat' => [
        'street' => 'Stationstraat',
        'number' => '41',
        'suffix' => null,
    ],
];

foreach ($addresses as $address => $evaluated) {
    
    it('can parse address "'.$address.'"', function() use ($address, $evaluated) {

        AddressParser::setAddressFormat([
            AddressParser::T_NUMBER,
            AddressParser::T_STREET,
        ]);

        $parser = new AddressParser($address);
        $parser->evaluate();

        assertEquals($evaluated['street'], $parser->getStreet());
        assertEquals($evaluated['number'], $parser->getNumber());
        assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('parse_other_address_formats');
}

afterAll(function() {
    AddressParser::setAddressFormat([
        AddressParser::T_STREET,
        AddressParser::T_NUMBER,
        AddressParser::T_SUFFIX,
    ]);
});