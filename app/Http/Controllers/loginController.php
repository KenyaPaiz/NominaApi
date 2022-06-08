<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
use App\Models\ROl;
use Illuminate\Support\Js;

class loginController extends Controller
{
    public function accessBoss(Request $request){
        $user = $request->post('user');
        $password = $request->post('password');

        $access = Boss::select('name', 'id')->where("userName","=",$user)
        ->where("password","=",$password)->get();
        //session(['bossSession'=> $access]);
        foreach($access as $value){
            session(['bossId'=> $value->id]); //get Id
            session(['bossName' => $value->name]); //get Name
        }
        if($access == true){
            return redirect()->route("employe.table3");
        }
    }

    public function access(Request $request){
        $user = $request->post('user');
        $password = $request->post('password');
        $array = ['1','2','3'];
        $access = ROl::select('id');
        //admin access

        //boss access
        $accessBoss = Boss::select('name', 'id')->where("userName","=",$user)
        ->where("password","=",$password)->get();
        
        //employe access
        
        if($access == $array[1]){
            foreach($accessBoss as $value){
                session(['bossId'=> $value->id]); //get Id
                session(['bossName' => $value->name]); //get Name
            }
            return redirect()->route('welcome');
        }
    }
}
