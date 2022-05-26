<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){
        $admin = Employee::all();
        $json = array(
            "status" => 200,
            "detalle" => $admin
        );

        return json_encode($json, true);
    }
}
