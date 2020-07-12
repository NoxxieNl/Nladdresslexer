<?php
namespace Noxxienl\Nladdresslexer;

use Exception;
use Noxxienl\Nladdresslexer\CharacterTypeLexer;
use RuntimeException;

class AddressParser
{
    const T_STREET = 'street';
    const T_NUMBER = 'number';
    const T_SUFFIX = 'suffix';

    /**
     * @var array
     */
    protected static $format = [];

    /**
     * @var \Noxxienl\Nladdresslexer\CharacterTypeLexer
     */
    private $lexer;

    /**
     * @var array
     */
    private $splittedData = [
        'street' => null,
        'number' => null,
        'suffix' => null,
    ];

    /**
     * @var string|null
     */
    private $lookUp = null;

    /**
     * @var string|null
     */
    private $string;

    public function __construct(string $street, ?string $number = null)
    {
        $this->lexer = new CharacterTypeLexer;
        $this->string = preg_replace('/\s+/', ' ', $street.(! is_null($number) ? ' '.$number : null));

        if (count(self::$format) == 0) {
            self::$format = [
                self::T_STREET,
                self::T_NUMBER,
                self::T_SUFFIX
            ];
        }
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
        $this->moveToNextLookUp();

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
                $this->splittedData[$this->lookUp][] = $this->lexer->token['value'];

                // When the look up is the housenumber and the next token is a letter move to the next look up (suffix).
                if (! is_null($lookahead = $this->lexer->lookahead)) {
                    if ($lookahead['type'] == CharacterTypeLexer::T_LETTER && 
                        $this->lookUp == self::T_NUMBER && $this->getNextLookupItem() == self::T_SUFFIX && $this->getPreviousLookupItem() == self::T_STREET) {
                        
                        $this->moveToNextLookUp();
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
            // This is only when we are not in the street look up.
            if ($lookahead['type'] == CharacterTypeLexer::T_SPACE && $this->lookUp != self::T_STREET) {
                $this->moveToNextLookUp();
                $this->lexer->moveNextBy(2);
            }

            // When we are in the street lookup and a delimiter string is found with a space behind it BUT the next sequence is not the 
            // housenumber, then just continue collecting tokens, otherwise move on to the next look up.
            elseif ($lookahead['type'] == CharacterTypeLexer::T_SPACE && $this->lookUp == self::T_STREET) {
                if (! $this->parseSpaceToken(true)) {
                    $this->moveToNextLookUp();
                    $this->lexer->moveNextBy(2);
                }
            } else {
                // When there is a delimeter found in the number segment move the rest to the suffix section.
                if ($this->lookUp == self::T_NUMBER) {
                    $this->moveToNextLookUp();
                    $this->lexer->moveNext();
                }
            }
        }
    }

    /**
     * @var bool $returnBool
     * @return mixed
     */
    protected function parseSpaceToken(bool $returnBool  = false)
    {
        $stillStreet = false;

        if (! is_null($lookahead = $this->lexer->lookahead)) {
            if ($lookahead['type'] !== CharacterTypeLexer::T_LETTER) {

                // When the look up is street check if the next tokens are letters or numbers or a combination.
                // This is done for streets like "Plein 1945 12", it searches if there are more sequences of numbers.
                // The last sequence of numbers will be the look up "number", the rest will be part of the look up street.
                // This is only done with the default format <street> <number> <suffix>, other formats do not provide this.
                if ($this->lookUp == self::T_STREET && $this->getNextLookupItem() == self::T_NUMBER) {

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

                // When return bool is active, only return if the giving token is still part of the street or not.
                if ($returnBool) {
                    return $stillStreet;
                }

                // Check if we the specified look ahead token is still part of the street or not, if not move on
                // if it is add it to the street look up.
                if (! $stillStreet) {
                    $this->moveToNextLookUp();
                } else {
                    $this->splittedData[$this->lookUp][] = $this->lexer->token['value'];
                    $stillStreet = false;
                }
            } else {
                // We only want this behaviour when the look up is on the number part.
                if ($this->lookUp == self::T_NUMBER) {
                    $this->moveToNextLookUp();
                } else {
                    $this->splittedData[$this->lookUp][] = $this->lexer->token['value'];
                }
            }
        }
    }

    /**
     * Move the parsing process to the next look up.
     *
     * @return void
     */
    protected function moveToNextLookUp() : void
    {
        $this->lookUp = $this->getNextLookupItem();
    }

    /**
     * Get next item in the lookup table.
     *
     * @return string
     */
    protected function getNextLookupItem() : string
    {
        if (is_null($this->lookUp)) {
            return self::$format[0];
        }

        foreach (self::$format as $key => $item) {
            if ($item == $this->lookUp) {

                // Last format item, add the rest to it.
                if (! isset(self::$format[($key + 1)])) {
                    return self::$format[$key];
                }

                return self::$format[($key + 1)];
            }
        }

        throw new RuntimeException('Could not define next look up item.');
    }

    /**
     * @return string|null
     */
    protected function getPreviousLookupItem() : ?string
    {
        if (is_null($this->lookUp)) {
            return null;
        }

        foreach (self::$format as $key => $item) {
            if ($item == $this->lookUp) {

                // Last format item, add the rest to it.
                if (! isset(self::$format[($key - 1)])) {
                    return null;
                }

                return self::$format[($key - 1)];
            }
        }

        throw new RuntimeException('Could not define previous look up item.');
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
    public function getSuffix() : ?string
    {
        return is_null($this->splittedData[self::T_SUFFIX])
               ? null
               : implode('', $this->splittedData[self::T_SUFFIX]);
    }

    /**
     * @return string|null
     */
    public function getOriginalString() : ?string
    {
        return $this->string;
    }

    /**
     * @param array $format
     * @return void
     */
    public static function setAddressFormat(array $format) : void
    {
        foreach ($format as $item) {
            if (! in_array($item, [
                self::T_STREET,
                self::T_NUMBER,
                self::T_SUFFIX
            ])) {
                throw new Exception('Invalid address format specified.');
            }
        }

        self::$format = $format;
    }
}
