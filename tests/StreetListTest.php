<?php

use noxxienl\nladdresslexer\Repositories\StreetsWithEndNumber;


it('does find valid street as street ending with a number', function() {
    expect(StreetsWithEndNumber::is('Plein 1923'))->toBeTrue();
});

it('does not find the street if the given street is invalid', function() {
    expect(StreetsWithEndNumber::is('Plein 1924'))->toBeFalse();
});