<?php

use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoriesController;
use App\Http\Controllers\DashboardCourierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductImages;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ResponsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|p
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

Route::put('/timeoutuser/{id}', [TransaksiController::class, 'transactionsTimeout'])->name('transactions.timeout');
Route::middleware('auth:web')->prefix('users')->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('index');
  Route::get('/home/product/{product}', [HomeController::class, 'show']);
  Route::get('/cart', [CartController::class, 'detailcart'])->name('cart.index');
  Route::get('/addcart-{id}',[CartController::class, 'addcart'])->name('cart.add');
  Route::get('/cart/{product_id}', [CartController::class, 'destroy'])->name('cart.delete');
  Route::get('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
  Route::post('/checkout/confirm', [TransaksiController::class, 'store'])->name('checkout.confirm');
  Route::get('myTransaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
  Route::get('myTransaksi/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
  Route::post('upload-pembayaran-{id}', [TransaksiController::class, 'upload_pembayaran'])->name('upload.pembayaran');
  Route::post('upload-review-{id}', [TransaksiController::class, 'upload_review_user'])->name('upload.review.user');
  Route::get('/cartTransaksi', [TransaksiController::class, 'index'])->name('index.transaksi');
  Route::put('/success/{id}', [TransaksiController::class,'userSuccess'])->name('user.success');
  Route::put('/userCanceled/{id}',[TransaksiController::class,'userCanceled'])->name('user.canceled');
  Route::get('/order/expired', 'TransactionsController@orderExpired')->name('order.expired')->middleware('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name ('dashboard');
  
  });
  Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::resource('/products', DashboardProductController::class);
  
  });
  Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/products', DashboardProductController::class);
  Route::get('products/{idproduk}/{review}/add', [ResponsController::class,'add_response'])->name('response.add_response');
  Route::get('/edit',[ResponsController::class,'edit'])->name('response.edit');
  Route::post('/store', [ResponsController::class,'store'])->name('response.store');
  Route::put('/update',[ResponsController::class,'update'])->name('response.update');
});
Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kategori', DashboardCategoriesController::class);
  Route::post('/imageproduk/{id}/create', [ProductImages::class, 'store']);
  Route::post('/imageproduk/{id}/delete', [ProductImages::class, 'destroy']);
  Route::post('/categoryproduk/{id}/create', [ProductCategory::class, 'store']);
  Route::post('/categoryproduk/{id}/delete', [ProductCategory::class, 'destroy']);
  Route::get('/product/{product}/add-discount', [DashboardProductController::class, 'discount']);
  Route::post('/product/{product}/add-discount', [DashboardProductController::class, 'createDiscount']);
  Route::get('/product/{product}/edit-discount', [DashboardProductController::class, 'editDiscount']);
  Route::put('/product/{product}/edit-discount', [DashboardProductController::class, 'updateDiscount']);
 
 
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kurir', DashboardCourierController::class);
});
Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
//admin
Route::get('/transactions', [TransaksiController::class,'adminIndex']);
Route::get('/transactions/detail/{id}', [TransaksiController::class,'adminDetail'])->name('transactions.detail');
Route::put('/approve/{id}', [TransaksiController::class,'adminApprove'])->name('transactions.approve');
Route::put('/delivered/{id}', [TransaksiController::class,'adminDelivered'])->name('transactions.delivered');
Route::put('/canceled/{id}', [TransaksiController::class,'adminCanceled'])->name('transactions.canceled');
Route::put('/expired/{id}', [TransaksiController::class,'adminExpired'])->name('transactions.expired');
// Route::put('/timeout/{id}',[TransaksiController::class,'transactionsTimeout'])->name('transactions.timeout');
});
Auth::routes();
