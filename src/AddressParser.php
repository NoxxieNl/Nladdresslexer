<?php
namespace Noxxienl\Nladdresslexer;

use Noxxienl\Nladdresslexer\CharacterTypeLexer;
use RuntimeException;

class AddressParser
{
    const T_STREET = 0;
    const T_NUMBER = 1;
    const T_AFFIX = 2;

    /**
     * @var \Noxxienl\Nladdresslexer\CharacterTypeLexer
     */
    private $lexer;

    /**
     * @var array
     */
    private $splittedData = [null, null, null];

    /**
     * @var string|null
     */
    private $lookingFor = null;

    /**
     * @var string|null
     */
    private $string;

    public function __construct(string $string)
    {
        $this->lexer = new CharacterTypeLexer;
        $this->string = $string;
    }

    /**
     * Evaluate the given string.
     * 
     * @return boolean
     */
    public function evaluate() : bool
    {
        if (is_null($this->string)) {
            throw new RuntimeException('Cannot parse a empty string.');
        }

        $this->lexer->setInput($this->string);
        $this->lexer->moveNext();
        $this->moveToNextLooking();

        while (true) {

            // When there is no next token, break out of the loop.
            if (!$this->lexer->lookahead) {
                break;
            }

            // Move to next token.
            $this->lexer->moveNext();
            
            if ($this->lexer->token['type'] == CharacterTypeLexer::T_UNKNOWN) {
                throw new RuntimeException(
                    sprintf(
                        'Could not define the character "%s" for parsing',
                        $this->lexer->token['value']
                    )
                );
            }
        
            if ($this->lexer->token['type'] == CharacterTypeLexer::T_DELMITER) {
                $this->parseDelimiterToken();
            }

            if ($this->lexer->token['type'] == CharacterTypeLexer::T_SPACE) {
                $this->parseSpaceToken();
            } else {
                // Nothing special just add it to the current look up.
                $this->splittedData[$this->lookingFor][] = $this->lexer->token['value'];

                // When the look up is the housenumber and the next token is a letter move to the next look up (affix).
                if (! is_null($lookahead = $this->lexer->lookahead)) {
                    if ($lookahead['type'] == CharacterTypeLexer::T_LETTER && $this->lookingFor == self::T_NUMBER) {
                        $this->moveToNextLooking();
                    }
                }
            }
        }

        return true;
    }

    /**
     * @return void
     */
    protected function parseDelimiterToken() : void
    {
        if (! is_null($lookahead = $this->lexer->lookahead)) {

            // If there is space right behind a delimiter we assume the next item is going to be shown.
            if ($lookahead['type'] == CharacterTypeLexer::T_SPACE) {
                $this->moveToNextLooking();

                $this->lexer->moveNext();
                $this->lexer->moveNext();
            } else {
                // When there is a delimeter found in the number segment move the rest to the affix section.
                if ($this->lookingFor == self::T_NUMBER) {
                    $this->moveToNextLooking();
                    $this->lexer->moveNext();
                }
            }
        }
    }

    /**
     * @return void
     */
    protected function parseSpaceToken() : void
    {
        $stillStreet = false;

        if (! is_null($lookahead = $this->lexer->lookahead)) {
            if ($lookahead['type'] !== CharacterTypeLexer::T_LETTER) {

                // When the look up is street check if the next tokens are letters or numbers or a combination.
                // This is done for streets like "Plein 1945 12", it searches if there are more sequences of numbers.
                // The last sequence of numbers will be the look up "number", the rest will be part of the look up street.
                if ($this->lookingFor == self::T_STREET) {

                    while (true) {
                        if (is_null($peek = $this->lexer->peek())) {
                            break;
                        }
                        
                        if ($peek['type'] == CharacterTypeLexer::T_SPACE) {
                            if (! is_null($numberPeek = $this->lexer->peek())) {
                                if ($numberPeek['type'] == CharacterTypeLexer::T_NUMBER) {
                                    $stillStreet = true;
                                }
                            }
                        }
                    }
                }

                if (! $stillStreet) {
                    $this->moveToNextLooking();
                } else {
                    $this->splittedData[$this->lookingFor][] = $this->lexer->token['value'];
                    $stillStreet = false;
                }
            } else {
                if ($this->lookingFor == self::T_NUMBER) {
                    $this->moveToNextLooking();
                } else {
                    $this->splittedData[$this->lookingFor][] = $this->lexer->token['value'];
                }
            }
        }
    }

    /**
     * Move the parsing process to the next look up.
     *
     * @return void
     */
    protected function moveToNextLooking() : void
    {
        // When we are already on the last looking for, just return and add everything to the affix.
        if ($this->lookingFor == self::T_AFFIX) {
            return;
        }

        if (is_null($this->lookingFor)) {
            $this->lookingFor = self::T_STREET;
        }

        elseif ($this->lookingFor == self::T_STREET) {
            $this->lookingFor = self::T_NUMBER;
        }

        elseif ($this->lookingFor == self::T_NUMBER) {
            $this->lookingFor = self::T_AFFIX;
        }
        
        else {
            throw new RuntimeException('Could not define next looking for item.');
        }
    }

    /**
     * @return string|null
     */
    public function getStreet() : ?string
    {
        return is_null($this->splittedData[self::T_STREET])
               ? null
               : implode('', $this->splittedData[self::T_STREET]);
    }

    /**
     * @return integer|null
     */
    public function getNumber() : ?int
    {
        return is_null($this->splittedData[self::T_NUMBER])
               ? null
               : (int) implode('', $this->splittedData[self::T_NUMBER]);
    }

    /**
     * @return string|null
     */
    public function getAffix() : ?string
    {
        return is_null($this->splittedData[self::T_AFFIX])
               ? null
               : implode('', $this->splittedData[self::T_AFFIX]);
    }

    /**
     * @return string|null
     */
    public function getOriginalString() : ?string
    {
        return $this->string;
    }
}
