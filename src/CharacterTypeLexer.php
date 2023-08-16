<?php

namespace noxxienl\nladdresslexer;

use Doctrine\Common\Lexer\AbstractLexer;

class CharacterTypeLexer extends AbstractLexer
{
    public const T_LETTER = 1;
    public const T_NUMBER = 2;
    public const T_SPACE = 3;
    public const T_DELMITER = 4;
    public const T_ENDING = 5;

    public const T_UNKNOWN = 99;

    /**
     * @return array<int,string>
     */
    protected function getCatchablePatterns(): array
    {
        return [];
    }

    /**
     * @return array<int,string>
     */
    protected function getNonCatchablePatterns(): array
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
        } elseif (preg_match('/[0-9]/', $value)) {
            return self::T_NUMBER;
        } elseif (preg_match('/[:\-,]/', $value)) {
            return self::T_DELMITER;
        } elseif (preg_match('/[\'.\/\(\)]/', $value)) {
            return self::T_ENDING;
        } elseif ($value === ' ') {
            return self::T_SPACE;
        } elseif (! preg_match('/\p{L}+/', $value) && ! preg_match('/[0-9]/', $value)) {
            return self::T_LETTER;
        } else {
            return self::T_UNKNOWN;
        }
    }

    /**
     * Move the pointer the given amount of items.
     *
     * @param int $amount
     * @return void
     */
    public function moveNextBy(int $amount)
    {
        for ($i = 1; $i <= $amount; $i++) {
            $this->moveNext();
        }
    }
}
