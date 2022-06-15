<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PayRoll;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function taxes_employee(){
        $cont = 0;
        $boss = session('bossId');
        $payroll = PayRoll::join('employee', 'payroll.idEmployee', '=', 'employee.id')
                    ->where('employee.idStatus','=',1)->where('employee.idBoss','=',$boss)
                    ->select('employee.name as name','employee.lastName as lastName', 'employee.position as position', 'employee.salary as salary',
                    'payroll.salaryTotal as netSalary','payroll.taxes as taxes')->get();
        foreach($payroll as $value){
            echo $cont++;
        }
        $data = ["payroll" => $payroll, "contador" => $cont];
        $pdf = PDF::loadView('PDF.AllPayroll', $data);
        
        //return $pdf->download('employee.pdf');
        return $pdf->stream();
    }


    //filter by position 
    public function filterPosition(Request $request){
        $cont = 0;
        $cont2 = 0;
        $position = $request->post("position");

        $employee = Employee::join("payroll", "payroll.idEmployee", "=", "employee.id")
                    ->where("position","=",$position)->where("idStatus","=",1)
                    ->select("employee.*","payroll.taxes as taxes","payroll.salaryTotal as total")->get();
        foreach($employee as $value){
            echo $cont++;
            echo $cont2 += $value->total;
        }
        $data = ["employee" => $employee, "contador" => $cont, "sum" => $cont2];
        $pdf = PDF::loadView('PDF.filterPosition', $data);
        return $pdf->stream();
    }
    //filter by Deparment
    public function filterDeparment(Request $request){
        $cont = 0;
        $cont2 = 0;
        $idDepartment = $request->post("department");

        $department = Employee::join("department","employee.idDepartment","=","department.id")
                    ->join("payroll", "payroll.idEmployee", "=", "employee.id")
                    ->where("idDepartment", "=", $idDepartment)->where("idStatus","=",1)->
                    select("employee.*","department.name as department","payroll.taxes as taxes","payroll.salaryTotal as total")->get();
        foreach($department as $value){
            echo $cont++;
            echo $cont2 += $value->total;
        }
        $data = ["department" => $department, "contador" => $cont, "sum" => $cont2];
        $pdf = PDF::loadView('PDF.filterDepartment', $data);
        return $pdf->stream();
    }

}
