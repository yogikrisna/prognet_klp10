<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginControllerAdmin;

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

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name ('dashboard');
  });
Auth::routes();

Auth::routes(['verify' => true]);