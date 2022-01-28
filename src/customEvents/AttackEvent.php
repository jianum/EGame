<?php

namespace App\customEvents;

use Symfony\Contracts\EventDispatcher\Event;
use App\Controller\AttackController;

class AttackEvent extends Event{
    public const NAME = 'attack.start';

    protected $attack;

    public function __construct(AttackController $attack){
        $this->attack = $attack;
    }
    public function getAttack(){
        return $this->attack;
    }
}