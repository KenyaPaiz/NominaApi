<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF(){
        $employees = Employee::all();
        $data = ["employee" => $employees];
        $pdf = PDF::loadView('pdfEmploy', $data);
        
        //return $pdf->download('employee.pdf');
       
    }

    public function taxes_employee(){
        define("ISR",0.1);
        define("ISSS",0.07);
        define("AFP",0.07);

        $idBoss = session('bossId');
        $getEmployee = Employee::where("idBoss","=",$idBoss)->get();
        foreach($getEmployee as $value){
            $isr = $value->salary * ISR;
            $isss = $value->salary * ISSS;
            $afp = $value->salary * AFP;
            $result = $value->salary - ($isr + $isss + $afp);

            $data = ["employee" => $value, "total" => $result];
            
        }
        $pdf = PDF::loadView('EmployeesViews.payrol', $data);
        return $pdf->stream();
        
    }
    
}
