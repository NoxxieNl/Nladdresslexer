<?php

use noxxienl\nladdresslexer\Parser;

use function PHPUnit\Framework\assertEquals;

it('can get original string after init', function () {
    $parser = new Parser();
    $parser->evaluate('Amsterdamstraat 21 A');

    assertEquals('Amsterdamstraat 21 A', $parser->getOriginalString());
});

it('can change address format correctly', function () {
    Parser::setAddressFormat([
        Parser::T_NUMBER,
        Parser::T_SUFFIX,
    ]);

    assertEquals(
        [
            Parser::T_NUMBER,
            Parser::T_SUFFIX,
        ],
        Parser::$format,
    );
});

it('throws exception on invalid format', function () {
    Parser::setAddressFormat([
        Parser::T_NUMBER,
        'invalid',
    ]);
})->throws(Exception::class);

it('throws exception on empty string', function () {
    $parser = new Parser();
    $parser->evaluate('');
})->throws(Exception::class);

afterAll(function () {
    Parser::setAddressFormat([
        Parser::T_STREET,
        Parser::T_NUMBER,
        Parser::T_SUFFIX,
    ]);
});
