<?php

namespace App\Controller;

class SkillController {
    protected $name;
    protected $chance;
    protected $property;

    public function __construct($name, $chance, $property){
        $this->name = $name;
        $this->chance = (int) $chance;
        $this->property = $property;
    }

    public function getName(){
        return $this->name;
    }

    public function getChance(){
        return $this->chance;
    }

    public function getProperty(){
        return $this->property;
    }
}