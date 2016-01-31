<?php

class Player
{
    private $name;
    private $hand;
    private $hand_as_string;
    private $isWinner = false;

    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHand()
    {
        return $this->hand;
    }

    public function getHandString()
    {
        return $this->hand_as_string;
    }

    public function isWinner()
    {
        return $this->isWinner;
    }

    public function setHand($hand)
    {
        $eval_strings = [];
        $this->hand = $hand;

        foreach($hand as $Card)
        {
            $eval_strings[] = $Card->getCardEvalString();
        }

        $this->hand_as_string = implode(' ', $eval_strings);
    }

    public function setWinner()
    {
        $this->isWinner = true;
    }

}
