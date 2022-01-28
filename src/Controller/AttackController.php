<?php

namespace App\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use App\customEvents\AttackEvent;
use App\EventListener\AttackListener;

class AttackController{
    public $attacker;
    public $defender;

    public function __construct(object $attacker, object $defender){
        $this->attacker = $attacker;
        $this->defender = $defender;
    }
    public function startAttack(){
        $attackEvent = new AttackEvent($this);
        $eventDispatcher = new EventDispatcher();
        $listener = new AttackListener();
        $eventDispatcher->addListener('attack.start', array($listener, 'attackStarted'));        
        $eventDispatcher->dispatch($attackEvent, $attackEvent::NAME);
    }

    public function checkCharacterLuck(object $character){
        $luck = $character->getLuck();
        return mt_rand(0, 100) < $luck;
    }

    public function getAttacker(){
        return $this->attacker;
    }
    public function getDefender(){
        return $this->defender;
    }

}