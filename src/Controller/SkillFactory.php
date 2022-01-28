<?php

namespace App\Controller;

class SkillFactory{
    public static function create($skillName, $skillChance, $skillProperty){
        return new SkillController($skillName, $skillChance, $skillProperty);
    }
}