<?php

class Card
{
  private $value = null;
  private $suit = null;
  private $label = null;
  private $isRoyal = null;
  private $suitLetter = null;
  private $suits = ['♣','♦','♥','♠'];
  private $suitLetters = ['♥'=>'h','♣'=>'c','♦'=>'d','♠'=>'s']; 

  function __construct($value, $suit, $label, $isRoyal)
  {
    $this->value = $value == 0 ? 14 : $value;
    $this->suit = $suit;
    $this->label = $label;
    $this->isRoyal = $isRoyal;
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
