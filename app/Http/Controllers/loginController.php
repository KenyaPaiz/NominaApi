<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
use App\Models\Employee;
use App\Models\Admin;
use App\Models\Rol;
use Illuminate\Support\Js;

class loginController extends Controller
{

    public function access(Request $request){
        $user = $request->post('user');
        $password = $request->post('password');
        $accesAdmin = Admin::where("userName","=",$user)->where("password","=",$password)->get();
        $accessBoss = Boss::where("userName","=",$user)->where("password","=",$password)->get();
        $accesEmploye = Employee::where("userName","=",$user)->where("password","=",$password)->get();
        
        //admin access
        foreach($accesAdmin as $value){
            if($value->idRol == 1){
                session(['adminId'=> $value->id]); //get Id
                session(['adminName' => $value->name]); //get Name
                return redirect()->route('admin.template');
            }
        }
        //Boss Access
        foreach($accessBoss as $value){
            if($value->idRol == 2){
                session(['bossId'=> $value->id]); //get Id
                session(['bossName' => $value->name]); //get Name
                
                return redirect()->route('boss.template');
            }
        }
        //Employe access
        foreach($accesEmploye as $value){
            if($value->idRol == 3){
                session(['employeeId'=> $value->id]); //get Id
                session(['employeeName' => $value->name]); //get Name
                return redirect()->route('employee.template');
            }
        }
    }
}
