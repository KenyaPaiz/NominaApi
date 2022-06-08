<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Boss;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller{

    public function index(){
        /*Select the table to show the employees with the boss and company name.
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

        return json_encode($json, true);*/
        $id_boss = session('bossId');
        $employee = Employee::where("idStatus","=",1)->where("idBoss","=",$id_boss)->get();

        return view("BossViews.AllEmployee", array("employee" => $employee));

    }

    public function create(){
        return view("BossViews.RegisterEmploye");
    }

    public function store(Request $request){
        $employee = new Employee();
        $employee->name = $request->post('name');
        $employee->lastName = $request->post('lastName');
        $employee->phoneNumber = $request->post('phoneNumber');
        $employee->address = $request->post('address');
        $employee->position = $request->post('position');
        $employee->salary = $request->post('salary');
        $employee->userName = $request->post('userName');
        $employee->password = $request->post('password');
        $employee->idBoss = session('bossId');
        //active state = 1
        $employee->idStatus = 1;
        $employee->idRol = 3;
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

    public function edit($id){
        $employee = Employee::find($id);
        return view("BossViews.updateEmployee", array("employee" => $employee));
    }

    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $employee->name = $request->post('name');
        $employee->lastName = $request->post('lastName');
        $employee->address = $request->post('address');
        $employee->phoneNumber = $request->post('phoneNumber');
        $employee->position = $request->post('position');
        $employee->salary = $request->post('salary');

        $employee->update();

        return redirect()->route("employe.table3");
    }

    public function destroy($id){
        $boss = Employee::find($id);
        $boss->idStatus = 2;
        $boss->update();

        return redirect()->route("employe.table3");
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