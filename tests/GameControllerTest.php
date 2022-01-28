<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\GameController;


class GameControllerTest extends TestCase {
    protected $game;

    protected function setUp() : void{
        $this->game = $this->getMockBuilder(GameController::class)->setMethods(null)->disableOriginalConstructor()->getMock();
    }

    public function testCreateCharacterNotAllowed(){
        $result = $this->game->create('heroe');
        $this->assertSame('You are trying to create something that is not allowed.', $result);
    }

    public function testCreateCharacter(){
        $result = $this->game->create('hero');
        $this->assertTrue($result);
    }
}