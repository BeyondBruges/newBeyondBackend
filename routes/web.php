<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Analytic Type
    Route::delete('analytic-types/destroy', 'AnalyticTypeController@massDestroy')->name('analytic-types.massDestroy');
    Route::resource('analytic-types', 'AnalyticTypeController');

    // Analytic
    Route::delete('analytics/destroy', 'AnalyticController@massDestroy')->name('analytics.massDestroy');
    Route::resource('analytics', 'AnalyticController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Level
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::post('levels/media', 'LevelController@storeMedia')->name('levels.storeMedia');
    Route::post('levels/ckmedia', 'LevelController@storeCKEditorImages')->name('levels.storeCKEditorImages');
    Route::resource('levels', 'LevelController');

    // Level Object
    Route::delete('level-objects/destroy', 'LevelObjectController@massDestroy')->name('level-objects.massDestroy');
    Route::post('level-objects/media', 'LevelObjectController@storeMedia')->name('level-objects.storeMedia');
    Route::post('level-objects/ckmedia', 'LevelObjectController@storeCKEditorImages')->name('level-objects.storeCKEditorImages');
    Route::resource('level-objects', 'LevelObjectController');

    // Coupon
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Dynamic Coupon
    Route::delete('dynamic-coupons/destroy', 'DynamicCouponController@massDestroy')->name('dynamic-coupons.massDestroy');
    Route::resource('dynamic-coupons', 'DynamicCouponController');

    // Qr Code
    Route::delete('qr-codes/destroy', 'QrCodeController@massDestroy')->name('qr-codes.massDestroy');
    Route::resource('qr-codes', 'QrCodeController');

    // B Land Mark
    Route::delete('b-land-marks/destroy', 'BLandMarkController@massDestroy')->name('b-land-marks.massDestroy');
    Route::post('b-land-marks/media', 'BLandMarkController@storeMedia')->name('b-land-marks.storeMedia');
    Route::post('b-land-marks/ckmedia', 'BLandMarkController@storeCKEditorImages')->name('b-land-marks.storeCKEditorImages');
    Route::resource('b-land-marks', 'BLandMarkController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Notification
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::resource('notifications', 'NotificationController');

    // Partner Users
    Route::delete('partner-users/destroy', 'PartnerUsersController@massDestroy')->name('partner-users.massDestroy');
    Route::resource('partner-users', 'PartnerUsersController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionController');

    // Character
    Route::delete('characters/destroy', 'CharacterController@massDestroy')->name('characters.massDestroy');
    Route::post('characters/media', 'CharacterController@storeMedia')->name('characters.storeMedia');
    Route::post('characters/ckmedia', 'CharacterController@storeCKEditorImages')->name('characters.storeCKEditorImages');
    Route::resource('characters', 'CharacterController');

    // User Character
    Route::delete('user-characters/destroy', 'UserCharacterController@massDestroy')->name('user-characters.massDestroy');
    Route::resource('user-characters', 'UserCharacterController');

    // User Landmark
    Route::delete('user-landmarks/destroy', 'UserLandmarkController@massDestroy')->name('user-landmarks.massDestroy');
    Route::resource('user-landmarks', 'UserLandmarkController');

    // User Level
    Route::delete('user-levels/destroy', 'UserLevelController@massDestroy')->name('user-levels.massDestroy');
    Route::resource('user-levels', 'UserLevelController');

    // User Qr Code
    Route::delete('user-qr-codes/destroy', 'UserQrCodeController@massDestroy')->name('user-qr-codes.massDestroy');
    Route::resource('user-qr-codes', 'UserQrCodeController');

    // User Transaction
    Route::delete('user-transactions/destroy', 'UserTransactionController@massDestroy')->name('user-transactions.massDestroy');
    Route::resource('user-transactions', 'UserTransactionController');

    // User Coupon
    Route::delete('user-coupons/destroy', 'UserCouponController@massDestroy')->name('user-coupons.massDestroy');
    Route::resource('user-coupons', 'UserCouponController');

    // User Dynamic Coupon
    Route::delete('user-dynamic-coupons/destroy', 'UserDynamicCouponController@massDestroy')->name('user-dynamic-coupons.massDestroy');
    Route::resource('user-dynamic-coupons', 'UserDynamicCouponController');

    // User Level Object
    Route::delete('user-level-objects/destroy', 'UserLevelObjectController@massDestroy')->name('user-level-objects.massDestroy');
    Route::resource('user-level-objects', 'UserLevelObjectController');

    // User Level Question
    Route::delete('user-level-questions/destroy', 'UserLevelQuestionController@massDestroy')->name('user-level-questions.massDestroy');
    Route::resource('user-level-questions', 'UserLevelQuestionController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Analytic Type
    Route::delete('analytic-types/destroy', 'AnalyticTypeController@massDestroy')->name('analytic-types.massDestroy');
    Route::resource('analytic-types', 'AnalyticTypeController');

    // Analytic
    Route::delete('analytics/destroy', 'AnalyticController@massDestroy')->name('analytics.massDestroy');
    Route::resource('analytics', 'AnalyticController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Level
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::post('levels/media', 'LevelController@storeMedia')->name('levels.storeMedia');
    Route::post('levels/ckmedia', 'LevelController@storeCKEditorImages')->name('levels.storeCKEditorImages');
    Route::resource('levels', 'LevelController');

    // Level Object
    Route::delete('level-objects/destroy', 'LevelObjectController@massDestroy')->name('level-objects.massDestroy');
    Route::post('level-objects/media', 'LevelObjectController@storeMedia')->name('level-objects.storeMedia');
    Route::post('level-objects/ckmedia', 'LevelObjectController@storeCKEditorImages')->name('level-objects.storeCKEditorImages');
    Route::resource('level-objects', 'LevelObjectController');

    // Coupon
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Dynamic Coupon
    Route::delete('dynamic-coupons/destroy', 'DynamicCouponController@massDestroy')->name('dynamic-coupons.massDestroy');
    Route::resource('dynamic-coupons', 'DynamicCouponController');

    // Qr Code
    Route::delete('qr-codes/destroy', 'QrCodeController@massDestroy')->name('qr-codes.massDestroy');
    Route::resource('qr-codes', 'QrCodeController');

    // B Land Mark
    Route::delete('b-land-marks/destroy', 'BLandMarkController@massDestroy')->name('b-land-marks.massDestroy');
    Route::post('b-land-marks/media', 'BLandMarkController@storeMedia')->name('b-land-marks.storeMedia');
    Route::post('b-land-marks/ckmedia', 'BLandMarkController@storeCKEditorImages')->name('b-land-marks.storeCKEditorImages');
    Route::resource('b-land-marks', 'BLandMarkController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Notification
    Route::delete('notifications/destroy', 'NotificationController@massDestroy')->name('notifications.massDestroy');
    Route::resource('notifications', 'NotificationController');

    // Partner Users
    Route::delete('partner-users/destroy', 'PartnerUsersController@massDestroy')->name('partner-users.massDestroy');
    Route::resource('partner-users', 'PartnerUsersController');

    // Question
    Route::delete('questions/destroy', 'QuestionController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionController');

    // Character
    Route::delete('characters/destroy', 'CharacterController@massDestroy')->name('characters.massDestroy');
    Route::post('characters/media', 'CharacterController@storeMedia')->name('characters.storeMedia');
    Route::post('characters/ckmedia', 'CharacterController@storeCKEditorImages')->name('characters.storeCKEditorImages');
    Route::resource('characters', 'CharacterController');

    // User Character
    Route::delete('user-characters/destroy', 'UserCharacterController@massDestroy')->name('user-characters.massDestroy');
    Route::resource('user-characters', 'UserCharacterController');

    // User Landmark
    Route::delete('user-landmarks/destroy', 'UserLandmarkController@massDestroy')->name('user-landmarks.massDestroy');
    Route::resource('user-landmarks', 'UserLandmarkController');

    // User Level
    Route::delete('user-levels/destroy', 'UserLevelController@massDestroy')->name('user-levels.massDestroy');
    Route::resource('user-levels', 'UserLevelController');

    // User Qr Code
    Route::delete('user-qr-codes/destroy', 'UserQrCodeController@massDestroy')->name('user-qr-codes.massDestroy');
    Route::resource('user-qr-codes', 'UserQrCodeController');

    // User Transaction
    Route::delete('user-transactions/destroy', 'UserTransactionController@massDestroy')->name('user-transactions.massDestroy');
    Route::resource('user-transactions', 'UserTransactionController');

    // User Coupon
    Route::delete('user-coupons/destroy', 'UserCouponController@massDestroy')->name('user-coupons.massDestroy');
    Route::resource('user-coupons', 'UserCouponController');

    // User Dynamic Coupon
    Route::delete('user-dynamic-coupons/destroy', 'UserDynamicCouponController@massDestroy')->name('user-dynamic-coupons.massDestroy');
    Route::resource('user-dynamic-coupons', 'UserDynamicCouponController');

    // User Level Object
    Route::delete('user-level-objects/destroy', 'UserLevelObjectController@massDestroy')->name('user-level-objects.massDestroy');
    Route::resource('user-level-objects', 'UserLevelObjectController');

    // User Level Question
    Route::delete('user-level-questions/destroy', 'UserLevelQuestionController@massDestroy')->name('user-level-questions.massDestroy');
    Route::resource('user-level-questions', 'UserLevelQuestionController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
