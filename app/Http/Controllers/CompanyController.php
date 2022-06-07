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
                ->select('company.name','company.address','company.idStatus as statu','boss.name as boss')
                ->where('company.idStatus','=',1)->get();
        $json = array(
            "status" => 200,
            "detail" => $company
        );

        echo json_encode($json, true);
    }

    public function create(){
        return view('AdminViews.RegisterCompany');
    }

    public function store(Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();

        $company = new Company();
        $company->name = $request->post('name');
        $company->address = $request->post('address');
        //$company->idBoss = $value["id"];
        //active state = 1
        $company->idStatus = 1;
        $company->save();

        return redirect()->route("company.table2");
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
                    $data = array(
                        "idStatus" => 2
                    );
                    $company = Company::where('id', $id)->update($data);

                    $json = array(
                        "status" => 200,
                        "detail" => "The company was inactive"
                    );
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "sorry, you are not authorized to inactive this company"
                    );
                } 
            }
        }
        
        return json_encode($json, true);
    }
}
