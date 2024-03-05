<?php

use App\Http\Controllers\Api\AnalyticController;
use App\Http\Controllers\Api\BLandMarkController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BundlesController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CouponsController;
use App\Http\Controllers\Api\GeoController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\LevelObjectsController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\TimeController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserCharacterController;
use App\Http\Controllers\Api\UserCouponsController;
use App\Http\Controllers\Api\UserDynamicCouponsController;
use App\Http\Controllers\Api\UserLandMarkController;
use App\Http\Controllers\Api\UserLevelController;
use App\Http\Controllers\Api\UserGameLevelController;
use App\Http\Controllers\Api\UserLevelObjectController;
use App\Http\Controllers\Api\UserLevelQuestionController;
use App\Http\Controllers\Api\UserQRController;
use App\Http\Controllers\Api\UserSideQuestsController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\Api\PlayerManagementController;
use App\Http\Controllers\Api\UnlockController;
use App\Http\Controllers\Api\UrlVideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas de auth
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('login_apple', [PassportAuthController::class, 'loginApple']);

//Rutas abiertas a todo el mundo
Route::get('blog', [BlogController::class, 'index']);
Route::get('levels', [LevelController::class, 'index']);
Route::get('level_objects', [LevelObjectsController::class, 'index']);
Route::get('landmarks', [BLandMarkController::class, 'index']);
Route::get('coupons', [CouponsController::class, 'index']);
Route::get('products', [ProductsController::class, 'index']);
Route::get('digitalproducts', [ProductsController::class, 'digitalproducts']);
Route::get('questions', [QuestionController::class, 'index']);
Route::get('partners', [PartnerController::class, 'index']);
Route::get('company', [CompanyController::class, 'index']);
Route::get('url-videos', [UrlVideoController::class, 'index']);
Route::post('analytics', [AnalyticController::class, 'store']);
Route::post('checkgps', [GeoController::class, 'calculate']);
Route::get('countries', [PassportAuthController::class, 'countries']);
Route::get('age_groups', [PassportAuthController::class, 'agegroups']);
Route::get('bundles', [BundlesController::class, 'index']);
Route::post('password_reset', [PassportAuthController::class, 'forgot']);

//Rutas con login
Route::middleware('auth:api')->group(function () {
    Route::post('user', [PassportAuthController::class, 'user']);
    Route::post('udid', [PassportAuthController::class, 'udid']);
    Route::post('transaction_index', [TransactionController::class, 'index']);
    Route::post('transaction_store', [TransactionController::class, 'store']);
    Route::post('UserdynamicCoupon_index', [UserDynamicCouponsController::class, 'index']);
    Route::post('UserdynamicCoupon_store', [UserDynamicCouponsController::class, 'store']);
    Route::post('userlevels', [UserLevelController::class, 'index']);
    Route::post('userlevels_store', [UserLevelController::class, 'store']);
    Route::post('userCharacters', [UserCharacterController::class, 'index']);
    Route::post('userCharacter_store', [UserCharacterController::class, 'store']);
    Route::post('userlandmarks_index', [UserLandMarkController::class, 'index']);
    Route::post('userlandmarks_store', [UserLandMarkController::class, 'store']);
    Route::post('user_qr_index', [UserQRController::class, 'index']);
    Route::post('user_coupons_index', [UserCouponsController::class, 'index']);
    Route::post('user_coupons_store', [UserCouponsController::class, 'store']);
    Route::post('user_dynamic_coupons_index', [UserDynamicCouponsController::class, 'index']);
    Route::post('user_dynamic_coupon_update', [UserDynamicCouponsController::class, 'update']);
    Route::post('user_dynamic_coupons_store', [UserDynamicCouponsController::class, 'store']);
    Route::post('user_donate_bryghia', [TransactionController::class, 'donate']);
    Route::post('user_gift_bryghia', [TransactionController::class, 'gift']);
    Route::post('user_stats', [PassportAuthController::class, 'stats']);
    Route::post('add_time', [TimeController::class, 'addTime']);
    Route::post('set_time', [TimeController::class, 'setTime']);

    Route::post('changepassword', [PlayerManagementController::class, 'ChangePassword']);
    Route::post('deleteaccount', [PlayerManagementController::class, 'DeleteAccount']);

    Route::post('unlockgamemode', [UnlockController::class, 'unlockgame']);
    Route::post('unlocktourist', [UnlockController::class, 'unlocktourist']);
    Route::post('unlockeverything', [UnlockController::class, 'unlockeverything']);

    Route::post('user_sidequests_index', [UserSideQuestsController::class, 'index']);
    Route::post('user_sidequests_store', [UserSideQuestsController::class, 'store']);
    Route::post('user_sidequests_delete', [UserSideQuestsController::class, 'delete']);

    Route::post('Userlevelobject_index', [UserLevelObjectController::class, 'index']);
    Route::post('Userlevelobject_store', [UserLevelObjectController::class, 'store']);
    Route::post('Userlevelobject_delete', [UserLevelObjectController::class, 'delete']);

    Route::post('Userlevelquestion_index', [UserLevelQuestionController::class, 'index']);
    Route::post('Userlevelquestion_store', [UserLevelQuestionController::class, 'store']);
    Route::post('Userlevelquestion_delete', [UserLevelQuestionController::class, 'delete']);
    Route::get('usergamelevels', [UserGameLevelController::class, 'index']);
    Route::post('usergamelevels_store', [UserGameLevelController::class, 'store']);
    Route::post('language_update', [PassportAuthController::class, 'updateLanguage']);

    Route::get('unlock_four_city_gates', [UserLandMarkController::class, 'unlockFourCityGates']);

    Route::post('unlock_levels', [UnlockController::class, 'unlockLevels']);

});

