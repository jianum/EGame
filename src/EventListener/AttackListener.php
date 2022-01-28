<?php

namespace App\EventListener;
use App\customEvents\AttackEvent;

class AttackListener {
    protected $attack;
    protected $attacker;
    protected $defender;
    protected $attackDmg;
    protected $updatedHealth;
    protected $message;

    public function attackStarted(AttackEvent $attackEvent){
        $this->attack = $attackEvent->getAttack();
        $this->attacker = $this->attack->getAttacker();
        $this->defender = $this->attack->getDefender();

        $dmg = $this->attacker->getStrength();

        $this->attackDmg = $dmg - $this->defender->getDefence();
        $this->updatedHealth = $this->defender->getHealth() - $this->attackDmg;

        $attackSkills = $this->attacker->getAttackSkills();
        $defenceSkills = $this->defender->getDefenceSkills();

        if(!empty($defenceSkills)){
            foreach($defenceSkills as $k => $v){
                switch($v->getProperty()){
                    case '50dmg':
                        if(mt_rand(0,100) < $v->getChance()){
                            $this->message = " <b> - {$this->defender->getName()} used the {$v->getName()} skill</b>";
                            $this->attackDmg = (int) ($this->attackDmg / 2);
                            $this->updatedHealth = $this->defender->getHealth() - $this->attackDmg;
                        }
                        break;
                    default:
                    break;
                }
            }
        }

        $this->hit();

        if(!empty($attackSkills)){
            foreach($attackSkills as $k => $v){
                switch($v->getProperty()){
                    case '2xdmg':
                        if(mt_rand(0,100) < $v->getChance()){
                            $this->updatedHealth = $this->defender->getHealth() - $this->attackDmg;
                            $this->defender->setHealth($this->updatedHealth);
                            $this->message = " <b> - {$this->attacker->getName()} used the {$v->getName()} skill</b>";
                            $this->hit(true);
                        }
                        break;
                    default:
                    break;
                }
            }
        }

        

        
    }
    public function hit($skill = false){
        if($this->attack->checkCharacterLuck($this->defender) === true && $skill === false){
            echo "{$this->attacker->getName()} attack with {$this->attackDmg} DMG{$this->message}. {$this->defender->getName()} <b>AVOIDS</b>! - {$this->defender->getName()} HP remains the same: {$this->defender->getHealth()}</br></br>";
        }else{
            $this->defender->setHealth($this->updatedHealth);
            echo "{$this->attacker->getName()} attack with {$this->attackDmg} DMG!{$this->message} - {$this->defender->getName()} HP: {$this->defender->getHealth()}</br></br>";
        }
        $this->message = '';
    }
}