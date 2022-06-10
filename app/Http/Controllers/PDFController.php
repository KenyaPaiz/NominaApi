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
    
}
