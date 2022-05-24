<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Admin;

class AdminController extends Controller
{
    //Aqui van todo los metodos para admin
    public function index(){
        $admin = Admin::all();
        $json = array(
            "status" => 200,
            "detalle" => $admin
        );

        return json_encode($json, true);
    }
}
