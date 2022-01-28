<?php

namespace App\Controller;

abstract class CharacterAbstract {
    protected $name;
    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;
    protected $attackSkills;
    protected $defenceSkills;

    abstract public function prepareAttack(GameController $game);

    public function __toString(){
        return "Health: {$this->health} | Strength: {$this->strength} | Defence: {$this->defence} | Speed: {$this->speed} | Luck: {$this->luck} </br></br>";
    }

    /* -- Setters --- */
    public function setName($name){
        $this->name = $name;
    }
    public function setHealth($int){
        $health = (int) $int;
        if($health < 0){
            $this->health = 0;
        }else{
            $this->health = $health;
        }
    }
    public function setStrength($int){
        $this->strength = (int) $int;
    }
    public function setDefence($int){
        $this->defence = (int) $int;
    }
    public function setSpeed($int){
        $this->speed = (int) $int;
    }
    public function setLuck($int){
        $this->luck = (int) $int;
    }
    public function setAttackSkill($skill){
        $this->attackSkills[] = $skill;
    }
    public function setDefenceSkill($skill){
        $this->defenceSkills[] = $skill;
    }

    /* -- Getters --- */
    public function getName(){
        return $this->name;
    }
    public function getHealth(){
        return $this->health;
    }
    public function getStrength(){
        return $this->strength;
    }
    public function getDefence(){
        return $this->defence;
    }
    public function getLuck(){
        return $this->luck;
    }
    public function getAttackSkills(){
        return $this->attackSkills;
    }
    public function getDefenceSkills(){
        return $this->defenceSkills;
    }


    public function show(){
        echo $this;
    }
    

}