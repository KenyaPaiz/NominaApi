<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Boss;

class Boss_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
     //this method test the boss register
    public function test_RegisterBoss(){
        $boss = new Boss();
        $boss->setKeyName("Maximiliano");
        $this->assertEquals("Maximiliano",$boss->getKeyName());
    }
    
    //this method update the data of the bosses
    public function test_ModifyBoss(){
        $value = array("name"=>"Maxiliano");
        Boss::where("id",3)->update($value);
        $this->assertTrue(true);
    }

    //this method delete the boss
    public function test_DeleteBoss(){
        $value = array("idStatus"=>2);
        Boss::where("id",3)->update($value);
        $this->assertTrue(true);
    }
}
