<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //Aqui van todo los metodos para admin
    public function index(){
        $admin = Admin::all();
        $json = array(
            "status" => 200,
            "detail" => $admin
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
                'userName' => 'required|string|max:255|unique:admin',
                'password' => 'required|string|max:255',
            ]);

            if($validate->fails()){
                $error = $validate->errors();
                $json = array(
                    "status" => 404,
                    "detail" => $error
                );
            }else{
                $admin = new Admin();
                $admin->name = $data["name"];
                $admin->lastName = $data["lastName"];
                $admin->address = $data["address"];
                $admin->phoneNumber = $data["phoneNumber"];
                $admin->userName = $data["userName"];
                $admin->password = $data["password"];
                $admin->save();

                $json = array(
                    "status" => 200,
                    "detail" => "successfully registered admin"
                );
            }
        }else{
            $json = array(
                "status" => 404,
                "detail" => "Error registering"
            );
        }

        return json_encode($json, true);
    }

    //get an admin by id
    public function show($id, Request $request){
        $admin = Admin::where("id",$id)->get();

        if(!empty($admin)){
            
        }
    }
}
