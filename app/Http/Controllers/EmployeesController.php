<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Boss;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index(){
        //$employee = Employee::all();
        $employee = DB::table('employee')->join('boss','employee.idBoss','=','boss.id')
                    ->join('company','employee.idCompany','=','company.id')
                    ->select('employee.name','employee.lastName','employee.phoneNumber',
                             'employee.address','employee.salary','employee.userName',
                             'boss.name as boss','company.name as company')->get();
        $json = array(
            "status" => 200,
            "detalle" => $employee
        );

        return json_encode($json, true);
    }
    
    public function store(Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){ 
                $data = array(

                    "name" => $request->input("name"),
                    "lastName" => $request->input("lastName"),
                    "phoneNumber" => $request->input("phoneNumber"),
                    "address" => $request->input("address"),
                    "salary" => $request->input("salary"),
                    "idCompany" => $request->input("idCompany"),
                    "userName" => $request->input("userName"),
                    "password" => $request->input("password"),
                );
            
                if(!empty($data)){
                    $validate = Validator::make($data,
                    [
                        'name' => 'required|string|max:255',
                        'lastName' => 'required|string|max:255',
                        'phoneNumber' => 'required|numeric',
                        'address' => 'required|string|max:255',
                        'salary' => 'required|numeric',
                        'idCompany' => 'required|string|max:255',
                        'userName' => 'required|string|max:255',
                        'password' => 'required|string|max:255',
                    ]); //endif
            
                    if($validate->fails()){
                        $error = $validate->errors();
                        $json = array(
                            "status" => 404,
                            "detail" => $error
                        );
                    }else{
                        $employee = new Employee();
                        $employee->name = $data["name"];
                        $employee->lastName = $data["lastName"];
                        $employee->phoneNumber = $data["phoneNumber"];
                        $employee->address = $data["address"];
                        $employee->salary = $data["salary"];
                        $employee->taxes = $data["idCompany"];
                        $employee->userName = $data["userName"];
                        $employee->password = $data["password"];
                        $employee->idBoss = $value["id"];
                        $employee->save();
            
                        $json = array(
                            "status" => 200,
                            "detail" => "successfully registered employee"
                        );
                    }
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "Error registering"
                    );
                }
            }
            return json_encode($json, true);
        }
    }
    public function update($id){

    }

    public function show($id){
        $employee = Employee::where("id",$id)->get();

        if(!empty($employee)){
           $json = array(
                "status" => 200,
                "detail" => $employee
           );
        }else{
            $json = array(
                "status" => 200,
                "detail" => "error getting admin"
           );
        }

        return json_encode($json, true);
    }
    public function destroy(Request $request, $id){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $value){
        if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
            $post = Employee::where('id', $id);
            $post->delete();
    
            $json = array(
                "status" => 200,
                "detail" => "delete employee"
            );

        }
        return json_encode($json, true);
    }
    }
}
