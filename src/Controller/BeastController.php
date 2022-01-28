<?php

namespace App\Controller;
use App\Controller\CharacterAbstract;

class BeastController extends CharacterAbstract{

    public function __construct(){
        echo "<b>Beast was created!</b> ";
    }

    public function prepareAttack(GameController $game){
        $attack = AttackFactory::create($game->beast, $game->hero);
        $attack->startAttack();
    }
}