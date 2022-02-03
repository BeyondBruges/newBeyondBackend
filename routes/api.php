<?php

use App\Http\Controllers\Api\BLandMarkController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\LevelObjectsController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\QuestionController;
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
Route::get('b_land_marks', [BLandMarkController::class, 'index']);
Route::get('questions', [QuestionController::class, 'index']);
Route::get('partners', [PartnerController::class, 'index']);


//Rutas con login
Route::middleware('auth:api')->group(function () {
    
});



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});
