<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    public function generatePDF(){
        $employees = Employee::all();
        $data = ["employee" => $employees];
        $pdf = PDF::loadView('pdfEmploy', $data);
       
    }
    /*public function PDFTest(){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }*/
}
