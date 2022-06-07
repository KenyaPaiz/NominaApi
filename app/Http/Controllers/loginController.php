<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
use Illuminate\Support\Js;

class loginController extends Controller
{
    public function accessBoss(Request $request){
        $user = $request->post('user');
        $password = $request->post('password');

        $access = Boss::select('name', 'id')->where("userName","=",$user,"and", "password","=",$password)->get();
        if($access == true){
            return array($access);
        }
    }
}
