<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\PayRoll;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(){
        $employees = Employee::all();
        $data = ["employee" => $employees];
        $pdf = PDF::loadView('pdfEmploy', $data);
        
        //return $pdf->download('employee.pdf');
        return $pdf->stream();
    }

    public function taxes_employee(){
        $payroll = PayRoll::join('employee', 'payroll.idEmployee', '=', 'employee.id')
                    ->select('employee.name as name','employee.lastName as lastName', 'employee.salary as salary',
                    'payroll.salaryTotal as netSalary')->get();

        $data = ["payroll" => $payroll];
        $pdf = PDF::loadView('EmployeesViews.payrol', $data);
        
        //return $pdf->download('employee.pdf');
        return $pdf->stream();
    }


    //filter by position 
    public function filterPosition(Request $request){
        $position = $request->post("position");

        $employee = Employee::join("payroll", "payroll.idEmployee", "=", "employee.id")
                    ->where("position","=",$position)->where("idStatus","=",1)->select("employee.*","payroll.salaryTotal as total")->get();
        $data = ["employee" => $employee];
        $pdf = PDF::loadView('PDF.filterPosition', $data);
        return $pdf->stream();
    }
    //filter by Deparment
    public function filterDeparment(Request $request){
        $idDepartment = $request->post("department");

        $department = Employee::join("department","employee.idDepartment","=","department.id")
                    ->join("payroll", "payroll.idEmployee", "=", "employee.id")
                    ->where("idDepartment", "=", $idDepartment)->where("idStatus","=",1)->
                    select("employee.*","department.name as department","payroll.salaryTotal as total")->get();
        $data = ["department" => $department];
        $pdf = PDF::loadView('PDF.filterDepartment', $data);
        return $pdf->stream();
    }

}
