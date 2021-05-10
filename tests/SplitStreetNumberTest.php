<?php
use Noxxienl\Nladdresslexer\AddressParser;

$addresses = [
    '41, Stationstraat' => [
        'street' => 'Stationstraat',
        'number' => '41',
        'suffix' => null,
    ],
    '56, Plein 1925' => [
        'street' => 'Plein 1925',
        'number' => '56',
        'suffix' => null,
    ],
    '50 A, Ringweg Zuid / Rijksweg A20' => [
        'street' => 'Ringweg Zuid / Rijksweg A20',
        'number' => '50',
        'suffix' => 'A',
    ],
    '44 - C, Hoogte Kadijk' => [
        'street' => 'Hoogte Kadijk',
        'number' => '44',
        'suffix' => 'C',
    ]
];

foreach ($addresses as $address => $evaluated) {
    
    it('can parse address "'.$address.'"', function() use ($address, $evaluated) {

        list($number, $street) = explode(', ', $address);

        $parser = new AddressParser;
        $parser->evaluate($street, $number);

        $this->assertEquals($evaluated['street'], $parser->getStreet());
        $this->assertEquals($evaluated['number'], $parser->getNumber());
        $this->assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('parse_split_street_housenumber');
}

afterAll(function() {
    AddressParser::setAddressFormat([
        AddressParser::T_STREET,
        AddressParser::T_NUMBER,
        AddressParser::T_SUFFIX,
    ]);
});