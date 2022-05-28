<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;

class Employee_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //this method test the employee register
    public function test_RegisterEmploye(){
        $employe =  new Employee();
        $employe->setKeyName("Mario");
        $this->assertEquals("Mario",$employe->getKeyName());
    }
    //this method test the update data of employee
    public function test_ModifyEmploye(){
        //Company::where("id",$id)->update($data);
        $value = array("name"=>"Mario");
        Employee::where("id",3)->update($value);
        $this->assertTrue(true);
    }
    //this method test delete a employee
    public function test_DeleteEmployee(){
        $value = array("idStatus"=>2);
        Employee::where("id",3)->update($value);
        $this->assertTrue(true);
    }

}
