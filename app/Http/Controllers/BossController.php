<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
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

    public function create(){
        return view("AdminViews.register");
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
        $boss->save();

        return redirect()->route("boss.table");
 
    }

    public function edit($id){

        $boss = Boss::find($id);
        return view("AdminViews.updateBoss",array('boss' => $boss));
    }

    public function show($id){
        $boss = Boss::where("id",$id)->get();
        if(!empty($boss)){
           $json = array(
                "status" => 200,
                "detail" => $boss
           );
        }else{
            $json = array(
                "status" => 200,
                "detail" => "Error getting boss."
           );
        }

        return json_encode($json, true);
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

}
