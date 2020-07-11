<?php
namespace Noxxienl\Nladdresslexer;

use Doctrine\Common\Lexer\AbstractLexer;

class CharacterTypeLexer extends AbstractLexer
{
    const T_LETTER = 1;
    CONST T_NUMBER = 2;
    CONST T_SPACE = 3;
    CONST T_DELMITER = 4;
    CONST T_ENDING = 5;

    CONST T_UNKNOWN = 99;

    protected function getCatchablePatterns()
    {
        return [];
    }

    protected function getNonCatchablePatterns()
    {
        return [];
    }

    /**
     * Evaluate the token type.
     *
     * @param mixed $value
     * @return mixed
     */
    protected function getType(&$value)
    {
        if (preg_match('/\p{L}+/', $value)) {
            return self::T_LETTER;
        }

        elseif (preg_match('/[0-9]/', $value)) {
            return self::T_NUMBER;
        }

        elseif (preg_match('/[:\-,]/', $value)) {
            return self::T_DELMITER;
        }

        elseif (preg_match('/[\'.\/\(\)]/', $value)) {
            return self::T_ENDING;
        }

        elseif ($value === ' ') {
            return self::T_SPACE;
        }

        elseif (! preg_match('/\p{L}+/', $value) && ! preg_match('/[0-9]/', $value)) {
            return self::T_LETTER;
        }

        else {
            return self::T_UNKNOWN;
        }
    }

    /**
     * Move the pointer the given amount of items.
     *
     * @param integer $amount
     * @return void
     */
    public function moveNextBy(int $amount) {
        for ($i = 1; $i <= $amount; $i++) {
            $this->moveNext();
        }
    }
}