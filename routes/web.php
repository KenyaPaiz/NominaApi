<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
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
//Route::get('/admin',[AdminController::class, 'index'])->name('admin');
Route::resource('/','App\Http\Controllers\AdminController');

/*Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index');
    Route::post('/insertar', 'store');
});*/

//Route::resource('/photos', AdminController::class);

