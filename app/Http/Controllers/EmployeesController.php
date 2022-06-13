<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Boss;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use App\Models\PayRoll;

class EmployeesController extends Controller{

    public function index(){
        $id_boss = session('bossId');
        $employee = Employee::join("department","employee.idDepartment","=","department.id")
            ->where("idStatus","=",1)->where("idBoss","=",$id_boss)
            ->select("employee.*","department.name as department")->get();
        return view("BossViews.AllEmployee", array("employee" => $employee));
    }

    public function getTemplate(){
        return view("templateEmployee");
    }

    public function create(){
        $department = Department::all();
        return view("BossViews.RegisterEmploye", array("department" => $department));
    }

    public function store(Request $request){
        
        $employee = new Employee();
        $employee->name = $request->post('name');
        $employee->lastName = $request->post('lastName');
        $employee->phoneNumber = $request->post('phoneNumber');
        $employee->position = $request->post('position');
        $total = $employee->salary = $request->post('salary');
        $employee->userName = $request->post('userName');
        $employee->password = $request->post('password');
        $employee->idDepartment = $request->post('department');
        $employee->idBoss = session('bossId');
        //active state = 1
        $employee->idStatus = 1;
        $employee->idRol = 3;
        $employee->save();

        //constants 
        define("ISR",0.035);
        define("ISSS",0.03);
        define("AFP",0.07);
        $idEmp = $employee->id;
        $isr = $total * ISR;
        $isss = $total * ISSS;
        $afp = $total * AFP;

        //calculate of taxes
        if($total >= 550){
            $taxesEmp = $isr + $isss + $afp;
            $result = $total - $taxesEmp;
        }else{
            $taxesEmp = $isss + $afp;
            $result = $total - $taxesEmp;
        }
            
        
        /** SAVE in table Payrol */
        $taxes = new PayRoll();
        $taxes->idEmployee = $idEmp;
        $taxes->taxes = $taxesEmp;
        $taxes->salaryTotal = $result;
        $taxes->save();

        return redirect()->route('employe.table3');
    }

    public function show(){
        $id_employee = session('employeeId');
        $employee = Employee::where("id","=", $id_employee)->get();

        return view("EmployeesViews.profile", array("employee" => $employee));
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

    public function showInactive(){
        $id_boss = session('bossId');
        $employee = Employee::join("department","employee.idDepartment","=","department.id")
            ->where("idStatus","=",2)->where("idBoss","=",$id_boss)
            ->select("employee.*","department.name as department")->get();

        return view("BossViews.AllEmployeeInactive", array("employeeInactive" => $employee));
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