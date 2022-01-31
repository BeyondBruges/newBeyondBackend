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

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
