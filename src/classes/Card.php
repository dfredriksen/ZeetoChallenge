<?php

class Card
{
  private $value = null;
  private $suit = null;
  private $label = null;
  private $isRoyal = null;

  function __construct($value, $suit, $label, $isRoyal)
  {
    $this->value = $value == 0 ? 14 : $value;
    $this->suit = $suit;
    $this->label = $label;
    $this->isRoyal = $isRoyal;
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
    echo $this->label . $this->suit;
  }

}
