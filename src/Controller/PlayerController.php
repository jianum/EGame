<?php 

namespace App\Controller;
use App\Controller\CharacterAbstract;

class PlayerController extends CharacterAbstract{
    public function __construct(){
        echo '<b>Hero was created!</b> ';
    }

    public function prepareAttack(GameController $game){
        $attack = AttackFactory::create($game->hero, $game->beast);
        $attack->startAttack();
    }
}