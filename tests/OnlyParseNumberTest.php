<?php

use noxxienl\nladdresslexer\Parser;

$addresses = [
    '41' => [
        'street' => null,
        'number' => '41',
        'suffix' => null,
    ],
    '46A' => [
        'street' => null,
        'number' => '46',
        'suffix' => 'A',
    ],
    '50 ABC' => [
        'street' => null,
        'number' => '50',
        'suffix' => 'ABC',
    ],
    '12a DEF' => [
        'street' => null,
        'number' => '12',
        'suffix' => 'a DEF',
    ],
    '46 a BOVEN' => [
        'street' => null,
        'number' => '46',
        'suffix' => 'a BOVEN',
    ],
];

beforeAll(function () {
    Parser::setAddressFormat([
        Parser::T_NUMBER,
        Parser::T_SUFFIX,
    ]);
});

$parser = new Parser();
foreach ($addresses as $number => $evaluated) {

    /** @method TestCall|TestCase|mixed it(string $description, Closure $closure = null) */
    it('can parse number "'.$number.'"', function () use ($number, $evaluated, $parser) {
        $parser->evaluate($number);

        $this->assertEquals($evaluated['street'], $parser->getStreet());
        $this->assertEquals($evaluated['number'], $parser->getNumber());
        $this->assertEquals($evaluated['suffix'], $parser->getSuffix());

    })->group('parse_only_number');
}

afterAll(function () {
    Parser::setAddressFormat([
        Parser::T_STREET,
        Parser::T_NUMBER,
        Parser::T_SUFFIX,
    ]);
});
