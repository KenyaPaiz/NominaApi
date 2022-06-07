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

    public function create(){
        return view("AdminViews.RegisterEmploye");
    }

    public function store(Request $request){
        $token = $request->header('Authorization');
        $boss = Boss::all();

        $employee = new Employee();
        $employee->name = $request->post('name');
        $employee->lastName = $request->post('lastName');
        $employee->phoneNumber = $request->post('phoneNumber');
        $employee->address = $request->post('address');
        $employee->position = $request->post('position');
        $employee->salary = $request->post('salary');
        $employee->userName = $request->post('userName');
        $employee->password = $request->post('password');
        //$employee->idBoss = $value["id"];
        $employee->idCompany = $request->post('idCompany');
        //active state = 1
        $employee->idStatus = 1;
        $employee->save();
            
        return redirect()->route('employe.table3');
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
                        "detail" => "The employee was inactive."
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

    public function destroyAll($idBoss){
        $data = array(
            "idStatus" => 2
        );

        $employee = Employee::where("idBoss", $idBoss)->update($data);
        if($employee == true){
            $json = array(
                "status" => 200,
                "detail" => "all employees are inactive"
            );
        }else{
            $json = array(
                "status" => 404,
                "detail" => "error"
            );
        }
        return json_encode($json, true);
    }
}