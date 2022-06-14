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

/*** ROUTES - WEB */
// LOGIN
Route::get('/', function() {
    return view('login'); 
})->name('login.view');
Route::get('/access',[loginController::class, 'access'])->name('boss.access');

/** TEMPLATES */
Route::get('/templateBoss', [BossController::class, 'getTemplate'])->name('boss.template');
Route::get('/templateAdmin', [AdminController::class, 'getTemplate'])->name('admin.template');
Route::get('/templateEmployee', [EmployeesController::class, 'getTemplate'])->name('employee.template');

// BOSS Data
Route::get('/boss',[BossController::class, 'index'])->name('boss.table');
Route::get('/register',[BossController::class, 'create'])->name('boss.form');
Route::post('/store',[BossController::class, 'store'])->name('boss.register');
Route::get('/edit/{id}',[BossController::class, 'edit'])->name('boss.edits');
Route::put('/update/{id}',[BossController::class, 'update'])->name('boss.modify');
Route::put('/deactive/{id}',[BossController::class, 'destroy'])->name('boss.inactive');
Route::get('/profileBoss',[BossController::class, 'show'])->name('boss.profile');

//Company Data
Route::get('/companyIndex',[CompanyController::class, 'index'])->name('company.table2');
Route::get('/registerCompany',[CompanyController::class, 'create'])->name('company.form');
Route::post('/storeCompany',[CompanyController::class, 'store'])->name('company.save');
Route::get('/editCompany/{id}',[CompanyController::class, 'edit'])->name('company.edits');
Route::put('/updateCompany/{id}',[CompanyController::class, 'update'])->name('company.modify');
Route::put('/deactiveCompany/{id}',[CompanyController::class, 'destroy'])->name('company.inactive');

//Employee Data
Route::get('/employeIndex',[EmployeesController::class, 'index'])->name('employe.table3');
Route::get('/showEmployee',[EmployeesController::class, 'show'])->name('employee.profile');
Route::get('/registerEmploye',[EmployeesController::class, 'create'])->name('employe.register');
Route::post('/storeEmploye',[EmployeesController::class, 'store'])->name('employe.save');
Route::get('/editEmployee/{id}',[EmployeesController::class, 'edit'])->name('employe.edits');
Route::put('/updateEmployee/{id}',[EmployeesController::class, 'update'])->name('employee.modify');
Route::get('/showEmployeeInactive',[EmployeesController::class, 'showInactive'])->name('employe.tableInactive');
Route::put('/deactiveEmployee/{id}',[EmployeesController::class, 'destroy'])->name('employee.inactive');
Route::get('/showById/{id}',[EmployeesController::class, 'showByBoss'])->name('boss.employee');

// PDF
Route::get('/generatePDF',[PDFController::class, 'generatePDF'])->name('pdf');
Route::get('/taxeEmployee',[PDFController::class,'taxes_employee'])->name('boss.taxes');
Route::get('/viewReport',[BossController::class, 'getFilterEmployee'])->name('boss.filter');
Route::get('/positionReport',[PDFController::class, 'filterPosition'])->name('filterPosition');
Route::get('/departmentReport',[PDFController::class, 'filterDeparment'])->name('filterDepartment');


