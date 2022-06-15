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
        $employee = Employee::join("department","employee.idDepartment","=","department.id")
        ->where("employee.id","=",$id_employee)
        ->select("employee.*","department.name as department")->get();
        return view("EmployeesViews.profile", array("employee" => $employee));
    }

    /** show by boss */
    public function showByBoss($id){
        $idBoss = session('bossId');
        $employee = Employee::join("department","employee.idDepartment","=","department.id")
        ->where("employee.id","=",$id)->where("idBoss","=",$idBoss)
        ->select("employee.*","department.name as department")->get();
        
        return view("BossViews.profileEmployee", array("employee" => $employee));
    }

    public function edit($id){
        $employee = Employee::find($id);
        $department = Department::all();
        return view("BossViews.updateEmployee", array("employee" => $employee, "department" => $department));
    }

    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $employee->name = $request->post('name');
        $employee->lastName = $request->post('lastName');
        $employee->idDepartment = $request->post('department');
        $employee->phoneNumber = $request->post('phoneNumber');
        $employee->position = $request->post('position');
        
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
        $employee = Employee::find($id);
        $employee->idStatus = 2;
        $employee->update();

        return redirect()->route("employe.table3");
    }

}