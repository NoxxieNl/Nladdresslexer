<?php
use noxxienl\nladdresslexer\Parser;

$addresses = [
    '12, stationstraat' => [
        'street' => '12',
        'number' => null,
        'suffix' => 'tationstraat',
    ],

    '61, Plein 1926 A' => [
        'street' => '61, Plein',
        'number' => '1926',
        'suffix' => 'A'
    ],

    '123 Main Street Smallville, Idaho 12345' => [
        'street' => '123 Main Street Smallville, Idaho',
        'number' => '12345',
        'suffix' => null,
    ],

    '118 rue Marguerite' => [
        'street' => '118 rue Marguerite',
        'number' => null,
        'suffix' => null,
    ]
];

$parser = new Parser;
foreach ($addresses as $address => $evaluated) {

    /** @method TestCall|TestCase|mixed it(string $description, Closure $closure = null) */
    it('cannot parse address "'.$address.'"', function() use ($address, $evaluated, $parser) {  
        $parser->evaluate($address);

        $this->assertEquals($evaluated['street'], $parser->getStreet());
        $this->assertEquals($evaluated['number'], $parser->getNumber());
        $this->assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('invalid_address_notations');
}