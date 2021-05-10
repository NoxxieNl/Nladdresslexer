<?php
use Noxxienl\Nladdresslexer\AddressParser;

$addresses = [
    'Dorpstraat 2' => [
        'street' => 'Dorpstraat',
        'number' => '2',
        'suffix' => null,
    ],
    'Dorpstr. 2' => [
        'street' => 'Dorpstr.',
        'number' => '2',
        'suffix' => null,
    ],
    'Laan 1933 2'  => [
        'street' => 'Laan 1933',
        'number' => '2',
        'suffix' => null,
    ],
    '18 Septemberplein 12'  => [
        'street' => '18 Septemberplein',
        'number' => '12',
        'suffix' => null,
    ],
    'Kerkstraat 42-f3' => [
        'street' => 'Kerkstraat',
        'number' => '42',
        'suffix' => 'f3',
    ],
    'Kerk straat 2b' => [
        'street' => 'Kerk straat',
        'number' => '2',
        'suffix' => 'b',
    ],
    '42nd street, 1337a' => [
        'street' => '42nd street',
        'number' => '1337',
        'suffix' => 'a',
    ],
    '1e Constantijn Huigensstraat 9b' => [
        'street' => '1e Constantijn Huigensstraat',
        'number' => '9',
        'suffix' => 'b',
    ], 
    'Maas-Waalweg 15'  => [
        'street' => 'Maas-Waalweg',
        'number' => '15',
        'suffix' => null,
    ],
    'De Dompelaar 1 B' => [
        'street' => 'De Dompelaar',
        'number' => '1',
        'suffix' => 'B',
    ],
    'Kümmersbrucker Straße 2' => [
        'street' => 'Kümmersbrucker Straße',
        'number' => '2',
        'suffix' => null,
    ],
    'Friedrichstädter Straße 42-46' => [
        'street' => 'Friedrichstädter Straße',
        'number' => '42',
        'suffix' => '46',
    ],
    'Höhenstraße 5A' => [
        'street' => 'Höhenstraße',
        'number' => '5',
        'suffix' => 'A',
    ],
    'Saturnusstraat 60-75' => [
        'street' => 'Saturnusstraat',
        'number' => '60',
        'suffix' => '75',
    ],
    'Plein \'40-\'45 10' => [
        'street' => 'Plein \'40-\'45',
        'number' => '10',
        'suffix' => null,
    ],
    'Plein 1945 1' => [
        'street' => 'Plein 1945',
        'number' => '1',
        'suffix' => null,
    ],
    'Steenkade t/o 56' => [
        'street' => 'Steenkade t/o',
        'number' => '56',
        'suffix' => null,
    ],
    'Steenkade a/b Twee Gezusters' => [
        'street' => 'Steenkade a/b Twee Gezusters',
        'number' => null,
        'suffix' => null,
    ],
    'Nieuwe gracht 22zw /2'  => [
        'street' => 'Nieuwe gracht',
        'number' => '22',
        'suffix' => 'zw/2',
    ],
    'Nieuwe gracht 224 2' => [
        'street' => 'Nieuwe gracht 224',
        'number' => '2',
        'suffix' => null,
    ],
    'Graaf FLorisstraat 20' => [
        'street' => 'Graaf FLorisstraat',
        'number' => '20',
        'suffix' => null,
    ],
    'Jacob van Lennepkade 53- I' => [
        'street' => 'Jacob van Lennepkade',
        'number' => '53',
        'suffix' => 'I',
    ],
    '1e Jan van der Heijdenstraat 77-2 A' => [
        'street' => '1e Jan van der Heijdenstraat',
        'number' => '77',
        'suffix' => '2 A',
    ],
    'Lange Slachterijstraat 22 bus II'  => [
        'street' => 'Lange Slachterijstraat',
        'number' => '22',
        'suffix' => 'bus II',
    ],
    'Hoogte Kadijk 44 - C'  => [
        'street' => 'Hoogte Kadijk',
        'number' => '44',
        'suffix' => 'C',
    ],
    'Grevelingenstr 116 (2)' => [
        'street' => 'Grevelingenstr',
        'number' => '116',
        'suffix' => '(2)',
    ],
    'Provinciale weg N216 12' => [
        'street' => 'Provinciale weg N216',
        'number' => '12',
        'suffix' => null,
    ],
    'Rijksweg 75 A2 31' => [
        'street' => 'Rijksweg 75 A2',
        'number' => '31',
        'suffix' => null,
    ],
    'Ringweg Zuid / Rijksweg A20 50 A' => [
        'street' => 'Ringweg Zuid / Rijksweg A20',
        'number' => '50',
        'suffix' => 'A',
    ],
    'September 1944-straat 2' => [
        'street' => 'September 1944-straat',
        'number' => '2',
        'suffix' => null,
    ],
    'Station - straat voor de brug 40' => [
        'street' => 'Station - straat voor de brug',
        'number' => '40',
        'suffix' => null,
    ],
    'Station , straat voor de brug- 40-' => [
        'street' => 'Station , straat voor de brug',
        'number' => '40',
        'suffix' => null,
    ],
];

foreach ($addresses as $address => $evaluated) {

    /** @method TestCall|TestCase|mixed it(string $description, Closure $closure = null) */
    it('can parse address "'.$address.'"', function() use ($address, $evaluated) {
        $parser = new AddressParser;
        $parser->evaluate($address);

        $this->assertEquals($evaluated['street'], $parser->getStreet());
        $this->assertEquals($evaluated['number'], $parser->getNumber());
        $this->assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('valid_address_notations');
}