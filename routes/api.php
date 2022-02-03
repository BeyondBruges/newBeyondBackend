<?php

use App\Http\Controllers\Api\BLandMarkController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\LevelObjectsController;
use App\Http\Controllers\Api\CouponsController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserDynamicCouponsController;
use App\Http\Controllers\Api\UserLevelObjectController;
use App\Http\Controllers\Api\UserLevelQuestionController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas de auth
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

//Rutas abiertas a todo el mundo
Route::get('blog', [BlogController::class, 'index']);
Route::get('levels', [LevelController::class, 'index']);
Route::get('level_objects', [LevelObjectsController::class, 'index']);
Route::get('b_landmarks', [BLandMarkController::class, 'index']);
Route::get('coupons', [CouponsController::class, 'index']);
Route::get('products', [ProductsController::class, 'index']);
Route::get('questions', [QuestionController::class, 'index']);
Route::get('partners', [PartnerController::class, 'index']);

//Rutas con login
Route::middleware('auth:api')->group(function () {

    Route::post('transaction_index', [TransactionController::class, 'index']);
    Route::post('transaction_store', [TransactionController::class, 'store']);
    Route::post('dynamicCoupon_index', [UserDynamicCouponsController::class, 'index']);
    Route::post('dynamicCoupon_store', [UserDynamicCouponsController::class, 'store']);
});



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});
