<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BossController extends Controller
{
    public function index(){
        $boss = Boss::where('idStatus','=',1)->get();
        
        return view("AdminViews.AllBosses", 
            array("boss" => $boss)
        );
    }

    public function getTemplate(){
        return view("templateBoss");
    }

    public function create(){
        return view("BossViews.register");
    }

    public function store(Request $request){

        $boss = new Boss();
        $boss->name = $request->post('name');
        $boss->lastName = $request->post('lastName');
        $boss->address = $request->post('address');
        $boss->phoneNumber = $request->post('phoneNumber');
        $boss->userName = $request->post('userName');
        $boss->password = $request->post('password');
        //active state = 1
        $boss->idStatus = 1;
        $boss->idRol = 2;
        $boss->save();

        return redirect()->route("login.view");
    }

    public function show(){
        $id_boss = session('bossId');
        $boss = Boss::where("id","=",$id_boss)->get();

        return view("BossViews.profileBoss", array("boss" => $boss));
    }

    public function edit($id){
        $boss = Boss::find($id);
        return view("AdminViews.updateBoss",array('boss' => $boss));
    }

    public function update($id, Request $request){
        $boss = Boss::find($id);
        $boss->name = $request->post('name');
        $boss->lastName = $request->post('lastName');
        $boss->address = $request->post('address');
        $boss->phoneNumber = $request->post('phoneNumber');
        $boss->userName = $request->post('userName');
        $boss->password = $request->post('password');
        $boss->update();

        return redirect()->route("boss.table");
    }

    public function destroy($id){
        $boss = Boss::find($id);
        $boss->idStatus = 2;
        $boss->update();

        return redirect()->route("boss.table");
    }

    //Filter PDF
    //Filter by Position
    public function getFilterEmployee(){
        $id_boss = session('bossId');
        $postion = Employee::where("idBoss","=",$id_boss)->select("position")->distinct()->get();
        $department = Employee::join("department","employee.idDepartment", "=", "department.id")
                    ->where("idBoss","=",$id_boss)->where("employee.idStatus","=",1)
                    ->select("employee.idDepartment as id","department.name as name")->distinct()->get();
        return view("BossViews.filterEmployee", array("position" => $postion, "department" => $department));
    }
    //filter by Deparment
    public function getFilterDeparment(){
        $id_boss = session('bossId');
        $department = Employee::join("department","employee.idDepartment", "=", "department.id")
                    ->where("idBoss","=",$id_boss)->where("employee.idStatus","=",1)
                    ->select("employee.idDepartment as id","department.name as name")->distinct()->get();
        return view("BossViews.filterEmployee", array("department" => $department));
    }

}
