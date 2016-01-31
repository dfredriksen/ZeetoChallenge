<?php

class HoldEmTest extends PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        require_once __DIR__ . '/../../src/classes/HoldEm.php';
    }

    public function testGame()
    {
      $HoldEm = new HoldEm(false);
      $HoldEmMock  = new ReflectionClass('HoldEm');
      $dealCommunity = $HoldEmMock->getMethod('dealCommunity');
      $dealCommunity->setAccessible(true);
      $dealCommunity->invokeArgs($HoldEm,[]);
      $community = $HoldEm->getCommunity();

      $this->assertTrue(is_array($community));
      $this->assertEquals(5,count($community));

      $HoldEm->setNumberPlayers(2);
      $dealPlayers = $HoldEmMock->getMethod('dealPlayers');
      $dealPlayers->setAccessible(true);
      $dealPlayers->invokeArgs($HoldEm, []);
      $players = $HoldEm->getPlayers(); 

      $this->assertEquals(2,count($players));
      $this->assertTrue(is_array($players));

      foreach($players as $Player)
      {
        $this->assertTrue($Player instanceOf Player);
      }
 
    }
}
