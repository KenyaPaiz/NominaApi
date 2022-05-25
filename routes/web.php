<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::resource('/', "App\Http\Controllers\AdminController");
/*Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::get('/mostraradmin/{id}', 'show'); 
    Route::post('/insertaradmin', 'store');
});
Route::controller(CompanyController::class)->group(function () {
    Route::get('/company', 'index');
    Route::get('/mostrarCompany/{id}', 'show'); 
    Route::post('/insertarCompany', 'store');
});*/
//Route::get('/admin/{id}',[AdminController::class, 'show']);
//Route::resource('/', "App\Http\Controllers\CompanyController");
//Route::resource('/', "App\Http\Controllers\EmployerController");

//Route::resource('/', "App\Http\Controllers\BossController");
Route::get('/company',[CompanyController::class, 'index']);
Route::post('/companyP',[CompanyController::class, 'store']);
