<?php

namespace App\Controller;
use App\Controller\GameController;
 
class HomeController{

    /*
    * @Route("/index", name="index")  
    */
    public function index(){
        $game = new GameController;
        $game->create('hero');
        $game->hero->setName('Oderus');
        $game->hero->setHealth(rand(70,100));
        $game->hero->setStrength(rand(70, 80));
        $game->hero->setDefence(rand(45,55));
        $game->hero->setSpeed(rand(40,50));
        $game->hero->setLuck(rand(10,30));
        $game->hero->show();

        $attackSkill = SkillFactory::create('Rapid strike', 10, '2xdmg');
        $defenceSkill = SkillFactory::create('Magic shield', 20, '50dmg');

        $game->hero->setAttackSkill($attackSkill);
        $game->hero->setDefenceSkill($defenceSkill);
        
        $game->create('beast');
        $game->beast->setName('Beast');
        $game->beast->setHealth(rand(60,90));
        $game->beast->setStrength(rand(60, 90));
        $game->beast->setDefence(rand(40,60));
        $game->beast->setSpeed(rand(40,60));
        $game->beast->setLuck(rand(25,40));
        $game->beast->show();

        $game->battle($game);

        exit();
    }
}