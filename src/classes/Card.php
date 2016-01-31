<?php

class Card
{
  private $value = null;
  private $suit = null;

  function __construct($value, $suit)
  {
    $this->value = $value;
    $this->suit = $suit;
  }
}
