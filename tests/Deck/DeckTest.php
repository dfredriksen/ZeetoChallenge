<?php

class DeckTest extends PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        require __DIR__ . '/../../src/classes/Deck.php';
    }
   private $suits = ['♣','♦','♥','♠'];
  private $suitLetters = ['♥'=>'h','♣'=>'c','♦'=>'d','♠'=>'s']; 
 
    public function testDeck()
    {

        $Deck = new Deck();

        $cards = $Deck->getCards();

        $this->assertEquals(52, count($cards), 'There must be 52 cards in the Deck');

        $spades = [];
        $hearts = [];
        $clubs = [];
        $diamonds = [];

        foreach($cards as $Card)
        {
            switch($Card->getSuit())
            {
                case '♣':
                    $clubs[] = $Card;
                break;
                case '♦':
                    $diamonds[] = $Card;
                break;
                case '♥':
                    $hearts[] = $Card;
                break;
                case '♠':
                    $spades[] = $Card;
                break;
                default:
                    throw new Exception('Invalid Suit Found.');

            };
        }

        $this->assertEquals(13, count($spades), 'There must be 13 spade cards');
        $this->assertEquals(13, count($hearts), 'There must be 13 heart cards');
        $this->assertEquals(13, count($clubs), 'There must be 13 club cards');
        $this->assertEquals(13, count($diamonds), 'There must be 13 diamond cards');

        $Card = $Deck->dealCard();

        $this->assertTrue($Card instanceOf Card);

        $cards = $Deck->dealCards(5);

        $this->assertEquals(5, count($cards));

        $cards = $Deck->dealCards(2);
        $this->assertEquals(2, count($cards));

        $stack = $Deck->getStack();

        //We dealt 8 cards, so should only have 44 in the stack
        $this->assertEquals(44, count($stack));

    }
}
?>
