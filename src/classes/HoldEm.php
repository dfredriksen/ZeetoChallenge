<?php
require_once 'Card.php';
require_once 'Deck.php';
require_once 'Player.php';

class HoldEm
{
    private $stillPlaying = true;
    private $Deck;
    private $players = null;
    private $community = null;
    private $Evaluator;
    private $Winner;


    function __construct()
    {
        $this->Evaluator = new \SpecialK\Evaluate\SevenEval();       
 
        while($this->stillPlaying)
        {
            $this->Deck = new Deck();
            $this->Winner = null;
            $this->players = [];
            $this->community = [];
        
            echo "How many players (Type 0 to quit)?: ";
            $number_players = readline();

            if(!is_numeric($number_players) || $number_players > 20 )
            {
                echo "\nPlayers must be an integer between 1 and 20.\n";
                continue;
            }
            elseif($number_players < 1)
            {
                echo "\nGoodbye!\n\n";
                break;             
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
                $hand = $this->Deck->dealCards(2);
                $Player = new Player('Player ' . ($index + 1));                
                echo "\nPlayer " . ($index+1) . " was dealt: ";

                foreach($hand as $Card)
                {
                    $Card->printCard();
                    echo " ";
                }           
                echo "\n";
                $totalhand = array_merge($community, $hand);
                $Player->setHand($totalhand);
                $players[] = $Player;
            }

            echo "\n";            
                        
            foreach($players as $Player)
            {
                $hasLoss = false;
                foreach($players as $Competitor)
                {
                    if($Competitor == $Player)
                        continue;

                    $hand1 = $Player->getHandString();
                    $hand2 = $Competitor->getHandString();
                    $score = $this->Evaluator->compare($hand1, $hand2);            
                    $hasLoss = ($score < 1);
                    if($hasLoss)
                        break;
                }

                if(!$hasLoss)
                {
                    $Player->setWinner();
                    $this->Winner = $Player;
                    break;
                }
            }   

            echo $this->Winner->getName() . " is the winner of this round!\n\n";

        }
    }

    public function scoreHand($hand)
    {
        //sort hand
        //hash hand
    }

}
