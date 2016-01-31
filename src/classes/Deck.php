<?php

require_once 'Card.php';

class Deck
{
    private $cards = [];
    private $suits = ['♣','♦','♥','♠'];
    private $labels = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];
    private $stack;

    function __construct()
    {
        $suits = 4;
        $index = 0;
        $suitindex = 0;
        for($suitindex = 0; $suitindex < 4; $suitindex++)
        {
            for($index = 0; $index < 13; $index++)
            {
                $Card = new Card(
                    $index, 
                    $this->suits[$suitindex]
                );
                $this->cards[] = $Card;
            }            
        }

        $this->stack = $this->cards;
    }

    public function dealCard()
    {
        $key = array_rand($this->stack);
        $Card = $this->stack[$key];
        unset($this->stack[$key]);
        return $Card;
    }

    public function dealCards($number)
    {
        if(!is_numeric($number) || $number < 1)
            throw new InvalidArgumentException('number must be an integer greater than 0');

        $index = 0;
        $dealt = [];
        for($index; $index < $number; $index++)
        {
            $dealt[] = $this->dealCard();
        }

        return $dealt;
    }

    public function getCards()
    {
        return $this->cards;
    }
    
    public function getStack()
    {
        return $this->stack;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function getSuits()
    {
        return $this->suits;
    }

}
