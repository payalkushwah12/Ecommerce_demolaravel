<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\apiUserController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'api'],function($router){

Route::post('/register',[apiUserController::class,'register']);
Route::post('/login',[apiUserController::class,'login']);
Route::post('/logout',[apiUserController::class,'logout']);
Route::get('/editProfile/{id}',[apiUserController::class,'editProfile']);
Route::post('/updateProfile',[apiUserController::class,'updateProfile']);
Route::post('/changePassword',[apiUserController::class,'changePassword']);
Route::get('/index',[apiUserController::class,'index']);
Route::post('/refresh',[apiUserController::class,'refresh']);
Route::post('/profile',[apiUserController::class,'profile']);
Route::post('/contact',[apiUserController::class,'contact']);
       
Route::get('/category',[FrontEndController::class,'category']);
Route::get('/products',[FrontEndController::class,'products']);
Route::get('/productdetails/{id}',[FrontEndController::class,'productdetails']);
Route::get('/categories/{id}',[FrontEndController::class,'categories']);
Route::post('/addWishlist',[FrontEndController::class,'addWishlist']);
Route::get('/showWishlist/{email}',[FrontEndController::class,'showWishlist']);
Route::get('/deleteItemWishlist/{id}',[FrontEndController::class,'deleteItemWishlist']);
Route::get('/coupons',[FrontEndController::class,'coupons']);
Route::post('/userOrders',[FrontEndController::class,'userOrders']);
Route::post('/userAddress',[FrontEndController::class,'userAddress']);
Route::get('/banners',[FrontEndController::class,'banners']);
Route::get('/myOrders/{email}',[FrontEndController::class,'myOrders']);
Route::post('/myOrdersDetails',[FrontEndController::class,'myOrdersDetails']);

Route::get('/cms',[FrontEndController::class,'cms']);
Route::get('/cmsdetails/{id}',[FrontEndController::class,'cmsdetails']);
Route::get('/configure',[FrontEndController::class,'configure']);
  
});

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */