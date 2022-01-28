<?php

namespace App\Controller;
use App\Controller\PlayerController;
use App\Controller\BeastController;

class GameController{
    public $hero;
    public $beast;
    
    public function __construct(){
        echo "<b>Game Started!</b> <br>";
        echo '<hr>';
    }
    public function create($type){
        $type = strtolower($type);
        switch($type){
            case 'hero':
                $this->hero = new PlayerController($this);
                return true;
            
            case 'beast':
                $this->beast = new BeastController($this);
                return true;
            
            default:
                return 'You are trying to create something that is not allowed.';
                break;
        }
    }

    public function battle(GameController $game){
        $round = 0;
        $gameOver = false;
        while(($round < 10) && ($gameOver === false)){
            foreach($game as $key => $character){
                if($game->hero->getHealth() == 0 || $game->beast->getHealth() == 0){
                    $gameOver = true;
                    $this->showWinner();
                    break;
                }
                $character->prepareAttack($game);
            }
            $round++;   
        }

        if($gameOver === false){
            $gameOver = true;
            $this->showWinner();
        }
        exit();
    }

    public function showWinner(){
        $winner = $this->hero->getName();
        if($this->hero->getHealth() === 0){
            $winner = $this->beast->getName();
        }
        if($this->hero->getHealth() !== 0 && $this->beast->getHealth() !== 0){
            if($this->hero->getHealth() > $this->beast->getHealth()){
                $winner = $this->hero->getName();
            }else{
                $winner = $this->beast->getName();
            }
        }
        echo '<hr>';
        echo "<b>Game Over! Winner: {$winner}</b>";

    }

    public function dd($value){
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }
}