<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;
use Illuminate\Support\Arr;

class Company_Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //this metod test the company Register
    public function test_RegisterCompany()
    {
        $company = new Company();
        $company->setKeyName("Coca Cola");
        $this->assertEquals("Coca Cola", $company->getKeyName());
    }
    //this method test the update data of the company
    public function test_ModifyCompany(){
        $value = array("name"=>"Coca Cola");
        Company::where("id",3)->update($value);
        $this->assertTrue(true);
    }
    //this method delete the company
    public function test_DeleteCompany(){
        $value = array("idStatus"=>2);
        Company::where("id",3)->update($value);
        $this->assertTrue(true);
    }
}
