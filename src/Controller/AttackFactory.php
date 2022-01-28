<?php

namespace App\Controller;

class AttackFactory {
    public static function create(object $attacker, object $defender){
        return new AttackController($attacker, $defender);
    }
}