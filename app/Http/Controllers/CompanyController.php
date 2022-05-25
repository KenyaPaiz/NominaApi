<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Company;

class CompanyController extends Controller

{
public function index(){
    $admin = Company::all();
    $json = array(
        "status" => 200,
        "detail" => $company
    );

    echo json_encode($json, true);
}

public function store(Request $request){
    $data = array(
        "id" => $request->input("id"),
        "name" => $request->input("name"),
        "address" => $request->input("address"),
        "idBoss" => $request->input("idBoss"),
    );

    if(!empty($data)){
        $validate = Validator::make($data,[
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'idBoss' => 'required|numeric',
        ]);

        if($validate->fails()){
            $error = $validate->errors();
            $json = array(
                "status" => 404,
                "detail" => $error
            );
        }else{
            $company = new Company();
            $company->id = $data["id"];
            $company->name = $data["name"];
            $company->address = $data["address"];
            $company->idBoss = $data["idBoss"];
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

    return json_encode($json, true);
}
}