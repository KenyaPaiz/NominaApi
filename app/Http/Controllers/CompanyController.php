<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Boss;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function index(){
        $id_boss = session('bossId');
        $company = Company::where('company.idStatus','=',1)->where("idBoss","=",$id_boss)->get();

        return view("BossViews.AllCompanies",array("company" => $company));
    }

    public function create(){
        return view('BossViews.RegisterCompany');
    }

    public function store(Request $request){
        $boss = Boss::all();

        $company = new Company();
        $company->name = $request->post('name');
        $company->address = $request->post('address');
        $company->idBoss = session('bossId');
        //active state = 1
        $company->idStatus = 1;
        $company->save();

        return redirect()->route("company.table2");
    }

    public function edit($id){
        $company = Company::find($id);
        return view("BossViews.updateCompany",array('company' => $company));
    }

    public function update($id, Request $request){
        $company = Company::find($id);
        $company->name = $request->post("name");
        $company->address = $request->post("address");
        $company->update();
        
        return redirect()->route("company.table2");
    }

    public function destroy($id){
        $company = Company::find($id);
        $company->idStatus = 2;
        $company->update();

        return redirect()->route("company.table2");
    }
}
