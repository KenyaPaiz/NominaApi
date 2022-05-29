<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Boss;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller{

    public function index(){
        //Select the table to show the employees with the boss and company name.
        $employee = DB::table('employee')->join('boss','employee.idBoss','=','boss.id')
                    ->join('company','employee.idCompany','=','company.id')
                    ->select('employee.name','employee.lastName','employee.phoneNumber',
                             'employee.address','employee.salary','employee.userName',
                             'boss.name as boss','company.name as company')
                    ->where('employee.idStatus','=',1)->get();
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

        foreach($boss as $key => $value){
            //Make the validator so that only the admin can register.
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){ 
                $data = array(
                    "name" => $request->input("name"),
                    "lastName" => $request->input("lastName"),
                    "phoneNumber" => $request->input("phoneNumber"),
                    "address" => $request->input("address"),
                    "position" => $request->input("position"),
                    "salary" => $request->input("salary"),
                    "userName" => $request->input("userName"),
                    "password" => $request->input("password"),
                    "idCompany" => $request->input("idCompany")
                );
            
                if(!empty($data)){
                    $validate = Validator::make($data,
                    [
                        'name' => 'required|string|max:255',
                        'lastName' => 'required|string|max:255',
                        'phoneNumber' => 'required|numeric',
                        'address' => 'required|string|max:255',
                        'position' => 'required|string|max:255',
                        'salary' => 'required|numeric',
                        'userName' => 'required|string|max:255',
                        'password' => 'required|string|max:255',
                        'idCompany' => 'required|numeric'
                    ]); 
            
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
                        $employee->position = $data["position"];
                        $employee->salary = $data["salary"];
                        $employee->userName = $data["userName"];
                        $employee->password = $data["password"];
                        $employee->idBoss = $value["id"];
                        $employee->idCompany = $data["idCompany"];
                         //active state = 1
                         $employee->idStatus = 1;
                        $employee->save();
            
                        $json = array(
                            "status" => 200,
                            "detail" => "Successfully registered employee"
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

    public function show($id){
        //Select the employee by the id with the boss and company name.
        $employee = Employee::where('employee.id',$id)->join('boss','employee.idBoss','=','boss.id')
                        ->join('company','employee.idCompany','=','company.id')
                        ->select('employee.name','employee.lastName','employee.phoneNumber',
                                'employee.address','employee.salary','employee.userName',
                                'boss.name as boss','company.name as company')
                        ->get();
        
        if(!empty($employee)){
           $json = array(
                "status" => 200,
                "detail" => $employee
           );
        }else{
            $json = array(
                "status" => 200,
                "detail" => "Error getting employee."
           );
        }

        return json_encode($json, true);
    }

    public function update(Request $request, $id){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $value){
            //base64_encode is for encrypt the params
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $getEmployee = Employee::where("id",$id)->get();
                if($value["id"] == $getEmployee[0]["idBoss"]){
                $data = array(
                    "name" => $request->input("name"),
                    "lastName" => $request->input("lastName"),
                    "address" => $request->input("address"),
                    "phoneNumber" => $request->input("phoneNumber"),
                    "userName" => $request->input("userName"),
                    "password" => $request->input("password")
                );

                //Update the employee by id.
                $employee = Employee::where("id",$id)->update($data);

                $json = array(
                    "status" => 200,
                    "detail" => "Successfully updated employee."
                );
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "sorry, you are not authorized to update this employee"
                    );
                }
            }
        }
        return json_encode($json, true);
    }

    public function destroy(Request $request, $id){
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                //Delete the employee by id.
                $getEmployee = Employee::where("id",$id)->get();
                if($value["id"] == $getEmployee[0]["idBoss"]){
                    $data = array(
                        "idStatus" => 2
                    );
                    $employee = Employee::where('id', $id)->update($data);
            
                    $json = array(
                        "status" => 200,
                        "detail" => "The employee was delete."
                    );
                }else{
                    $json = array(
                        "status" => 200,
                        "detail" => "sorry, you are not authorized to update this employee"
                    );
                }
                
            }   
        }
        return json_encode($json, true);
    }

    public function destroyAll(Request $request){
        $token = $request->header('Authoritazion');
        $boss = Boss::All();
        $json = Array();

        foreach($boss as $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $allEmployees = Employee::all();
                if($value["id"] == $allEmployees[0]["idBoss"]){

                    //idStatus = 2 is inactive employees
                    
                    $data = Array(
                        "idStatus" => 2
                    );
                    
                    $employee = Employee::all()->update($data);

                    $json = array(
                        "status" => 200,
                        "detail" => "All the employee was delete."
                    );
                }else{
                    $json = array(
                        "status" => 200,
                        "detail" => "sorry, you are not authorized to update this employee"
                    );
                }
            }
        }
        return json_encode($json, true);
    }
}