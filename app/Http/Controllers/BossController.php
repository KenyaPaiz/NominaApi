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
        $json = array(
            "status" => 200,
            "detail" => $boss
        );

        echo json_encode($json, true);
    }

    public function store(Request $request){
        $data = array(
            "name" => $request->input("name"),
            "lastName" => $request->input("lastName"),
            "address" => $request->input("address"),
            "phoneNumber" => $request->input("phoneNumber"),
            "userName" => $request->input("userName"),
            "password" => $request->input("password")
        );

        if(!empty($data)){
            $validate = Validator::make($data,[
                'name' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phoneNumber' => 'required|numeric',
                'userName' => 'required|string|max:255|unique:boss',
                'password' => 'required|string|max:255',
            ]);

            if($validate->fails()){
                $error = $validate->errors();
                $json = array(
                    "status" => 404,
                    "detail" => $error
                );
            }else{
                $boss = new Boss();
                $boss->name = $data["name"];
                $boss->lastName = $data["lastName"];
                $boss->address = $data["address"];
                $boss->phoneNumber = $data["phoneNumber"];
                $boss->userName = $data["userName"];
                $boss->password = $data["password"];
                //active state = 1
                $boss->idStatus = 1;
                $boss->save();

                $json = array(
                    "status" => 200,
                    "detail" => "Successfully registered Boss."
                );
            }
        }else{
            $json = array(
                "status" => 404,
                "detail" => "Error registering."
            );
        }

        return json_encode($json, true);
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
        $data = array(
            "name" => $request->input("name"),
            "lastName" => $request->input("lastName"),
            "address" => $request->input("address"),
            "phoneNumber" => $request->input("phoneNumber"),
            "userName" => $request->input("userName"),
            "password" => $request->input("password")
        );

        $boss = Boss::where("id",$id)->update($data);

        $json = array(
            "status" => 200,
            "detail" => "Successfully updated boss."
        );

        return json_encode($json, true);

    }

    public function destroy($id){
        $data = array(
            "idStatus" => 2
        );

        $boss = Boss::where('id', $id)->update($data);
        $json = array(
            "status" => 200,
            "detail" => "The boss was inactive."
        );

        return json_encode($json, true);
    }

}
