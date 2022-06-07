<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;

class loginController extends Controller
{
    public function accessBoss(Request $request){
        $user = $request->post('user');
        $password = $request->post('password');

        $access = Boss::where("userName","=",$user,"and", "password","=",$password);
        if($access == true){
            echo ":)";
        }
    }
}
