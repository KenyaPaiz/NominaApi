<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Boss;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller

{
public function index(){
    $company = Company::all();
    $json = array(
        "status" => 200,
        "detail" => $company
    );

    echo json_encode($json, true);
}

public function store(Request $request){
    $token = $request->header('Authorization');
    $boss = Boss::all();
    $json = array();

    foreach($boss as $key => $value){
        if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
            $data = array(
                "id" => $request->input("id"),
                "name" => $request->input("name"),
                "address" => $request->input("address")
            );
        
            if(!empty($data)){
                $validate = Validator::make($data,[
                    'name' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                ]);
        
                if($validate->fails()){
                    $error = $validate->errors();
                    $json = array(
                        "status" => 404,
                        "detail" => $error
                    );
                }else{
                    $company = new Company();
                    $company->name = $data["name"];
                    $company->address = $data["address"];
                    $company->idBoss = $value["id"];
                    $company->save();
        
                    $json = array(
                        "status" => 200,
                        "detail" => "successfully registered company"
                    );
                }
            }else{
                $json = array(
                    "status" => 404,
                    "detail" => "Error registering"
                );
            }
        }
    }

    return json_encode($json, true);
}
}