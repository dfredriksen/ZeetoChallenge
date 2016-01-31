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
    private $max_players = 20;
    private $number_players = null;

    function __construct($playGame = true)
    {
        $this->stillPlaying = $playGame;
        $this->Evaluator = new \SpecialK\Evaluate\SevenEval();       
        $this->Deck = new Deck();

        while($this->stillPlaying)
        {
            $this->Winner = null;
            $this->players = [];
            $this->community = [];
       
            if(!$this->getPlayersFromInput())
                continue;

            $this->dealCommunity();
            $this->dealPlayers();
            $this->findWinner();
            $this->printGameResults();
            $this->Deck = new Deck();
        }
    }

    private function dealPlayers()
    {
        for($index = 0; $index < $this->number_players; $index++)
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
            $totalhand = array_merge($this->community, $hand);
            $Player->setHand($totalhand);
            $players[] = $Player;
        }

        echo "\n";            
             
        $this->players = $players;       

    }

    private function dealCommunity()
    {
        $this->community = $this->Deck->dealCards(5);

        echo "\nCommunity:\n";
        foreach($this->community as $Card)
        {
            $Card->printCard();
            echo " ";
        }        
        echo "\n";

    }

    public function getPlayersFromInput()
    {
        echo "How many players (Type 0 to quit)?: ";
        $number_players = readline();

        if(!is_numeric($number_players) || $number_players > $this->max_players )
        {
            echo "\nPlayers must be an integer between 1 and " . $this->max_players . ".\n";
            return false;
        }
        elseif($number_players < 1)
        {
            echo "\nGoodbye!\n\n";
            $this->stillPlaying = false;             
            return false;
        }

        $this->setNumberPlayers($number_players);
        return true;
    }

    private function printGameResults()
    {
        if(!empty($this->Winner))
        {
            echo $this->Winner->getName() . " is the winner of this round!\n\n";
        }
        else
        {
            echo "Nobody is the winner of this round!\n\n";
        }

    }

    private function findWinner()
    {
        foreach($this->players as $Player)
        {
            $hasLoss = false;
            foreach($this->players as $Competitor)
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
    }

    public function getDeck()
    {
        return $this->Deck;
    }

    public function getCommunity()
    {
        return $this->community;
    }

    public function getWinner()
    {
        return $this->Winner;
    }

    public function getNumberPlayers()
    {
        return $this->number_players;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function setPlayers($players)
    {
        $this->players = $players;
    }

    public function setNumberPlayers($number_players)
    {
        if(!is_numeric($number_players) || $number_players < 1 || $number_players > $this->max_players)
            throw new InvalidArgumentException('Invalid number of players, players must be greater than 0 and less than ' . $this->max_players);

        $this->number_players = $number_players;
    }

}
