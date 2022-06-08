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
        $pdf = PDF::loadView('pdfEmploy', $data)->setOptions(['defaultFont' => 'sans-serif']);;
        
        //return $pdf->download('employee.pdf');
        return $pdf->stream();
    }
    
}
