<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\SkillController;

class SkillControllerTest extends TestCase {
    public function testCreateNewSkill(){
        $skill = new SkillController('Test skill', 10, 'dmg');
        $result = $skill->getName();
        $this->assertSame('Test skill', $result);
    }
}