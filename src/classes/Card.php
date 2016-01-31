<?php

class Card
{
  private $value = null;
  private $suit = null;
  private $label = null;
  private $isRoyal = null;
  private $suitLetter = null;
  private $suits = ['♣'=>'♣','♦'=>'♦','♥'=>'♥','♠'=>'♠'];
  private $suitLetters = ['♥'=>'h','♣'=>'c','♦'=>'d','♠'=>'s']; 
  private $labels = ['A','2','3','4','5','6','7','8','9','10','J','Q','K'];

  function __construct($value, $suit)
  {
    if(!isset($this->suits[$suit]))
        throw new InvalidArgumentException('Invalid suit');

    $this->label = $this->labels[$value];
    $this->isRoyal = ($value > 9);
    $this->value = $value == 0 ? 14 : $value;
    $this->suit = $suit;
    $this->suitLetter = $this->suitLetters[$suit];
  }

  public function getValue()
  {
    return $this->value;
  }

  public function getSuit()
  {
    return $this->suit;
  }

  public function getLabel()
  {
    return $this->label;
  }

  public function isRoyal()
  {
    return $this->isRoyal;
  }

  public function printCard()
  {
    echo $this->getCardPrintLabel();
  }

  public function getCardPrintLabel()
  {
    return $this->label . $this->suit;       
  }

  public function getCardEvalString()
  {
    return ($this->label == 10 ? 'T' : $this->label) . $this->suitLetter;
  }

}
