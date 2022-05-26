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
        $company = Company::join('boss','company.idBoss','=','boss.id')
                ->select('company.name','company.address','boss.name as boss')
                ->get();
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
                            "detail" => "Successfully registered company"
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

    public function show($id, Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $key => $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $company = Company::where('company.id',$id)->join('boss','company.idBoss','=','boss.id')
                            ->select('company.name','company.address','company.idBoss as idBoss','boss.name as boss')
                            ->get();
                if($value["id"] == $company[0]["idBoss"]){
                    $json = array(
                        "status" => 200,
                        "detail" => $company
                    );
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "sorry, you are not authorized to view this company"
                    );
                }
            }
        }
        
        return json_encode($json, true);
    }

    public function update($id, Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $key => $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $getcompany = Company::where("id",$id)->get();
                if($value["id"] == $getcompany[0]["idBoss"]){
                    $data = array(
                        "name" => $request->input("name"),
                        "address" => $request->input("address")
                    );
            
                    $company = Company::where("id",$id)->update($data);
            
                    $json = array(
                        "status" => 200,
                        "detail" => "Successfully updated company"
                    );
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "sorry, you are not authorized to update this company"
                    );
                } 
            }
        }
        
        return json_encode($json, true);
    }

    public function destroy($id, Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $key => $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $getcompany = Company::where("id",$id)->get();
                if($value["id"] == $getcompany[0]["idBoss"]){
                    $company = Company::where('id', $id);
                    $company->delete();

                    $json = array(
                        "status" => 200,
                        "detail" => "The company was deleted"
                    );
                }
            }else{
                $json = array(
                    "status" => 404,
                    "detail" => "sorry, you are not authorized to delete this company"
                );
            } 
        }
        
        return json_encode($json, true);
    }
}
