<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\BossController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**** ROUTES - API
Route::resource('/admin', "App\Http\Controllers\AdminController");
Route::resource('/boss',  "App\Http\Controllers\BossController");
Route::resource('/company', "App\Http\Controllers\CompanyController");
Route::resource('/employee',"App\Http\Controllers\EmployeesController");

Route::get('/taxes/{idEmp}',[PayrollController::class,'calculateTaxes']);
Route::delete('/employee/destroyAll/{id}',[EmployeesController::class, 'destroyAll']);*/

// ROUTES - WEB
// LOGIN
Route::get('/', function() {
    return view('login');
});
Route::get('/access',[loginController::class, 'accessBoss'])->name('boss.access');
//Route::get('/access',[loginController::class, 'access'])->name('boss.access');

// BOSS Data
Route::get('/boss',[BossController::class, 'index'])->name('boss.table');
Route::get('/register',[BossController::class, 'create'])->name('boss.form');
Route::post('/store',[BossController::class, 'store'])->name('boss.register');
Route::get('/edit/{id}',[BossController::class, 'edit'])->name('boss.edits');
Route::put('/update/{id}',[BossController::class, 'update'])->name('boss.modify');
Route::put('/deactive/{id}',[BossController::class, 'destroy'])->name('boss.inactive');

//Company Data
Route::get('/companyIndex',[CompanyController::class, 'index'])->name('company.table2');
Route::get('/registerCompany',[CompanyController::class, 'create'])->name('company.form');
Route::post('/storeCompany',[CompanyController::class, 'store'])->name('company.save');
Route::get('/editCompany/{id}',[CompanyController::class, 'edit'])->name('company.edits');
Route::put('/updateCompany/{id}',[CompanyController::class, 'update'])->name('company.modify');
Route::delete('/deactiveCompany/{id}',[CompanyController::class, 'destroy'])->name('company.inactive');

//empleoye Data
Route::get('/employeIndex',[EmployeesController::class, 'index'])->name('employe.table3');
Route::get('/registerEmploye',[EmployeesController::class, 'create'])->name('employe.register');
Route::post('/storeEmploye',[EmployeesController::class, 'store'])->name('employe.save');
Route::get('/editEmployee/{id}',[EmployeesController::class, 'edit'])->name('employe.edits');
Route::put('/updateEmployee/{id}',[EmployeesController::class, 'update'])->name('employee.modify');
Route::put('/deactiveCompany/{id}',[EmployeesController::class, 'destroy'])->name('employee.inactive');

// PDF
Route::get('/generatePDF',[PDFController::class, 'generatePDF'])->name('pdf');





