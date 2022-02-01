<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\Api\BlogController;


//Rutas de auth
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

//Rutas abiertas a todo el mundo

Route::middleware('auth:api')->group(function () {
    Route::get('blog', [BlogController::class, 'index']);
});



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});
