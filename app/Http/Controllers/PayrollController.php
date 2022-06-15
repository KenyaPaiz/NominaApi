<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boss;
use App\Models\Employee;

class PayrollController extends Controller
{
    // Method API
    public function calculateTaxes($idEmp, Request $request){
        define("ISR",0.035);
        define("ISSS",0.03);
        define("AFP",0.07);
        $token = $request->header('Authorization');
        $boss = Boss::all();
        $json = array();

        foreach($boss as $key => $value){
            if("Basic ".base64_encode($value["userName"].":".$value["password"])==$token){
                $getEmployee = Employee::where("id",$idEmp)->get();
                if($value["id"] == $getEmployee[0]["idBoss"]){

                    $isr = $getEmployee[0]["salary"] * ISR;
                    $isss = $getEmployee[0]["salary"] * ISSS;
                    $afp = $getEmployee[0]["salary"] * AFP;
                    
                    $result = $getEmployee[0]["salary"] - ($isr + $isss + $afp);

                    $json = array(
                        "status" => 200,
                        "detail" => array(
                            "Salary" => "$".$getEmployee[0]["salary"],
                            "ISR" => "$".round($isr,2),
                            "ISS" => "$".round($isss,2),
                            "AFP" => "$".round($afp,2),
                            "Total Salary" => "$".round($result,2)
                        )
                     );

                     
                }else{
                    $json = array(
                        "status" => 404,
                        "detail" => "sorry, you are not authorized"
                    );
                }
            }
        }
        return json_encode($json, true);
    }
}
