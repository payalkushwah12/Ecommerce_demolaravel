<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ConfigurationController;
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
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard/salesReport', [HomeController::class, 'salesReport']);
Route::get('/dashboard/customerReport', [HomeController::class, 'customerReport']);
Route::get('/dashboard/couponsReport', [HomeController::class, 'couponsReport']);

Route::get('/dashboard/addUsers', [UserController::class,'addUsers']);
Route::post('/dashboard/postaddUsers', [UserController::class,'postaddUsers']);
Route::get('/dashboard/showUsers', [UserController::class,'showUsers']);
Route::get('/dashboard/editUsers/{id}', [UserController::class,'editUsers']);
Route::post('/dashboard/updateUsers', [UserController::class,'updateUsers']);
Route::get('/dashboard/deleteUsers/{id}', [UserController::class,'deleteUsers']);
Route::get('/dashboard/showQueries', [UserController::class,'showQueries']);
Route::get('/dashboard/showUserAddress', [UserController::class,'showUserAddress']);
Route::get('/dashboard/editOrderStatus/{id}', [UserController::class,'editOrderStatus']);
Route::get('/dashboard/showUserOrders', [UserController::class,'showUserOrders']);
Route::post('/dashboard/updateOrderStatus', [UserController::class,'updateOrderStatus']);

Route::get('/dashboard/addBanners', [BannerController::class,'addBanners']);
Route::post('/dashboard/postaddBanners', [BannerController::class,'postaddBanners']);
Route::get('/dashboard/showBanners', [BannerController::class,'showBanners']);
Route::get('/dashboard/editBanners/{id}', [BannerController::class,'editBanners']);
Route::post('/dashboard/updateBanners', [BannerController::class,'updateBanners']);
Route::get('/dashboard/deleteBanners/{id}', [BannerController::class,'deleteBanners']);

Route::get('/dashboard/addCategory', [CategoryController::class,'addCategory']);
Route::post('/dashboard/postaddCategory', [CategoryController::class,'postaddCategory']);
Route::get('/dashboard/showCategory', [CategoryController::class,'showCategory']);
Route::get('/dashboard/editCategory/{id}', [CategoryController::class,'editCategory']);
Route::post('/dashboard/updateCategory', [CategoryController::class,'updateCategory']);
Route::get('/dashboard/deleteCategory/{id}', [CategoryController::class,'deleteCategory']);

Route::get('/dashboard/addProducts', [ProductController::class,'addProducts']);
Route::post('/dashboard/postaddProducts', [ProductController::class,'postaddProducts']);
Route::get('/dashboard/showProducts', [ProductController::class,'showProducts']);
Route::get('/dashboard/editProducts/{id}', [ProductController::class,'editProducts']);
Route::post('/dashboard/updateProducts', [ProductController::class,'updateProducts']);
Route::get('/dashboard/deleteProducts/{id}', [ProductController::class,'deleteProducts']);
Route::get('/dashboard/displayProductImages/{id}', [ProductController::class, 'displayProductImages']);
Route::get('/dashboard/deleteProductImages/{id}', [ProductController::class, 'deleteProductImages']);
Route::get('/dashboard/showQueries', [UserController::class,'showQueries']);

Route::get('/dashboard/addCoupons', [CouponController::class,'addCoupons']);
Route::post('/dashboard/postaddCoupons', [CouponController::class,'postaddCoupons']);
Route::get('/dashboard/showCoupons', [CouponController::class,'showCoupons']);
Route::get('/dashboard/editCoupons/{id}', [CouponController::class,'editCoupons']);
Route::post('/dashboard/updateCoupons', [CouponController::class,'updateCoupons']);
Route::get('/dashboard/deleteCoupons/{id}', [CouponController::class,'deleteCoupons']);

Route::get('/dashboard/addCms', [CMSController::class,'addCms']);
Route::post('/dashboard/postaddCms', [CMSController::class,'postaddCms']);
Route::get('/dashboard/showCms', [CMSController::class,'showCms']);
Route::get('/dashboard/editCms/{id}', [CMSController::class,'editCms']);
Route::post('/dashboard/updateCms', [CMSController::class,'updateCms']);
Route::get('/dashboard/deleteCms/{id}', [CMSController::class,'deleteCms']);

Route::get('/dashboard/addConfigure', [ConfigurationController::class,'addConfigure']);
Route::post('/dashboard/postaddConfigure', [ConfigurationController::class,'postaddConfigure']);
Route::get('/dashboard/showConfigure', [ConfigurationController::class,'showConfigure']);
Route::get('/dashboard/editConfigure/{id}', [ConfigurationController::class,'editConfigure']);
Route::post('/dashboard/updateConfigure', [ConfigurationController::class,'updateConfigure']);
Route::get('/dashboard/deleteConfigure/{id}', [ConfigurationController::class,'deleteConfigure']);



