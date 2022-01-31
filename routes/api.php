<?php
use App\Http\Controllers\Api\BlogController;

Route::get('blog', [BlogController::class, 'index']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
});
