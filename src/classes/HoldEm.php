<?php

class HoldEm
{
    private $stillPlaying = true;
    private $Deck;
    private $players = [];
    private $community = [];

    function __construct()
    {

        $this->Deck = new Deck();
        
        while($this->stillPlaying)
        {
            echo "How many players?: ";
            $number_players = readline();

            if(!is_numeric($number_players) || $number_players < 1 || $number_players > 20 )
            {
                echo "\nPlayers must be an integer between 1 and 20.\n";
                continue;
            }
            
            $community = $this->Deck->dealCards(5);

            echo "\nCommunity:\n";
            foreach($community as $Card)
            {
                $Card->printCard();
                echo " ";
            }        
            echo "\n";

            for($index = 0; $index < $number_players; $index++)
            {
                $players[] = $this->Deck->dealCards(2);
            }        
    
            foreach($players as $key=>$player)
            {
                echo "\nPlayer " . ($key+1) . ": ";

                foreach($player as $Card)
                {
                    $Card->printCard();
                    echo " ";
                }           
                echo "\n";
            }
            break; 
        }
   
    }

    public function scoreHand($hand)
    {
        //sort hand
        //hash hand
    }

}
