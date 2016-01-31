<?php

class CardTest extends PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        require_once __DIR__ . '/../../src/classes/HoldEm.php';
    }

    public function testCard()
    {
      $HoldEm = new HoldEm(false);
      $HoldEmMock  = new ReflectionClass('HoldEm');
      $dealCommunity = $HoldEmMock->getMethod('dealCommunity');
      $dealCommunity->setAccessible(true);
      $dealPlayers = $HoldEmMock->getMethod('dealPlayers');
      $dealPlayers->setAccessible(true);
      $findWinner = $HoldEmMock->getMethod('findWinner');
      $findWinner->setAccessible(true);   

      $dealCommunity->invokeArgs($HoldEm);
      $dealPlayers->invokeArgs($HoldEm);
      $findWinner->invokeArgs($HoldEm);

 
    }
}
