<?php

use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoriesController;
use App\Http\Controllers\DashboardCourierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductImages;
use App\Http\Controllers\ProductCategory;
use App\Models\ProductImage;
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
Route::get('view/productDetail/{id}',[App\Http\Controllers\HomeController::class,'detailProduct'])->name('detail-product');
Route::get('/admin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');

// Route::resource('/discounts', DiscountsController::class);

Route::prefix('admin/discount')->group(function () {
  Route::get('/', [DiscountsController::class, 'index'])->name('admin.discount')->middleware('auth:admin');
  Route::get('/add/{id}', [DiscountsController::class, 'create'])->name('discount.add')->middleware('auth:admin');
  Route::get('/{discount}/edit', [DiscountsController::class, 'edit'])->name('discount.edit')->middleware('auth:admin');
  Route::post('/store', [DiscountsController::class, 'strore'])->name('discount.store')->middleware('auth:admin');
  Route::put('/{id}/update', [DiscountsController::class, 'update'])->name('discount.update')->middleware('auth:admin');
  Route::delete('/{id}', [DiscountsController::class, 'destroy'])->name('discount.destroy')->middleware('auth:admin');
});


Route::middleware('auth:web')->prefix('users')->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('index');
  Route::get('/home/product/{product}', [HomeController::class, 'show']);
  Route::get('/shop', [UserController::class, 'shop']);
  Route::get('/blog', [UserController::class, 'blog']);
  Route::get('/contact', [UserController::class, 'contact']);
  Route::get('/cart', [CartController::class, 'detailcart'])->name('cart.index');
  Route::get('/addcart-{id}',[CartController::class, 'addcart']);
  Route::get('/buynow/{id}',[TransactionsController::class, 'buynow']);
  Route::get('/checkout', [TransaksiController::class, 'index']);
  // Route::post('/checkout', [TransactionsController::class, 'checkout'])->name('checkout');
  Route::get('/kota/{id}', [TransactionsController::class, 'getkota']);
  Route::get('/ongkir', [TransactionsController::class, 'getOngkir']);
  Route::get('/kota/service', [TransactionsController::class, 'getService']);
  Route::post('/transaction/checkout', [TransactionsController::class, 'insertcheckout']);
  Route::get('/viewpayment/{id}', [TransactionsController::class, 'invoice']);
  Route::get('/invoice/{id}', [TransactionsController::class, 'getInvoice']);
  Route::get('/timeout', [TransactionsController::class, 'timeout']);
  Route::post('/review', [TransactionsController::class, 'reviewpage']);
  Route::post('/editreview', [TransactionsController::class, 'revieweditpage']);
  Route::patch('/transactions/cancel/{id}', [TransactionsController::class, 'cancel_transaction']);
  Route::patch('/transactions/success/{id}', [TransactionsController::class, 'confirmation']);
  Route::patch('/upload/{id}', [TransactionsController::class, 'uploadPOP']);
  Route::patch('/review/store', [TransactionsController::class, 'review']);
  Route::patch('/review/edit', [TransactionsController::class, 'reviewedit']);
  Route::get('/image/proof_of_payment/{id}', [TransactionsController::class, 'image']);
});
// Route::get('/addcart/{id}',[App\Http\Controllers\CartController::class,'addcart'])->name('add-cart');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name ('dashboard');
  });

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/products', DashboardProductController::class);
});
Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kategori', DashboardCategoriesController::class);
  Route::post('/imageproduk/{id}/create', [ProductImages::class, 'store']);
  Route::post('/imageproduk/{id}/delete', [ProductImages::class, 'destroy']);
  Route::post('/categoryproduk/{id}/create', [ProductCategory::class, 'store']);
  Route::post('/categoryproduk/{id}/delete', [ProductCategory::class, 'destroy']);
  Route::get('/product/{product}/add-discount', [DashboardProductsController::class, 'discount']);
  Route::post('/product/{product}/add-discount', [DashboardProductsController::class, 'createDiscount']);
  Route::get('/product/{product}/edit-discount', [DashboardProductsController::class, 'editDiscount']);
  Route::put('/product/{product}/edit-discount', [DashboardProductsController::class, 'updateDiscount']);
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kurir', DashboardCourierController::class);
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cobahome', [App\Http\Controllers\TransaksiController::class, 'index']);

// Route::get('/pesan/{id}', [App\Http\Controllers\TransaksiController::class, 'pesan']);
