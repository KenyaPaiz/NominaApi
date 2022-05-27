<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Test;
use Tests\TestCase;
class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->assertTrue(true);
    }

    public function testAll(){
        $test = Test::all();
        $this->assertEquals("11", count($test));
    }

   
}
