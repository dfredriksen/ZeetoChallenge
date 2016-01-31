<?php

class CardTest extends PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        require_once __DIR__ . '/../../src/classes/Card.php';
    }

    public function testCard()
    {
        $Card = new Card(0,'♦');

        $cardstring = $Card->getCardEvalString();

        $this->assertEquals('Ad', $cardstring);
        $value = $Card->getValue();
        $isRoyal = $Card->isRoyal();
        $label = $Card->getCardPrintLabel();
        $this->assertEquals(14,$value);
        $this->assertTrue(!$isRoyal);
        $this->assertEquals('A♦', $label);

        $Card = new Card(10,'♣');
        $label = $Card->getCardPrintLabel();
        $isRoyal = $Card->isRoyal();

        $cardstring = $Card->getCardEvalString();
        $this->assertEquals('Jc',$cardstring);
        $this->assertTrue($isRoyal);
        $this->assertEquals('J♣', $label);

        $Card = new Card(9,'♥');
        $label = $Card->getCardPrintLabel();
        $isRoyal = $Card->isRoyal();

        $cardstring = $Card->getCardEvalString();
        $this->assertEquals('Th',$cardstring);
        $this->assertTrue(!$isRoyal);
        $this->assertEquals('10♥', $label);
       
    }
}
