<?php

use App\Http\Controllers\DashboardProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/

Auth::routes(['verify' => true]); //verifikasi email


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');
Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('userprofile');

Route::get('/admin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name ('dashboard');
  });

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/products', DashboardProductController::class);
  // Route::post('/categories-delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');
  // Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

