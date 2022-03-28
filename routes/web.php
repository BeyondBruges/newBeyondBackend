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
    Route::get('users/generateqr', 'UsersController@generateQrCode')->name('users.generateqr');
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
    Route::post('partners/parse-csv-import', 'PartnerController@parseCsvImport')->name('partners.parseCsvImport');
    Route::post('partners/process-csv-import', 'PartnerController@processCsvImport')->name('partners.processCsvImport');
    Route::resource('partners', 'PartnerController');

    // Level
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::post('levels/media', 'LevelController@storeMedia')->name('levels.storeMedia');
    Route::post('levels/ckmedia', 'LevelController@storeCKEditorImages')->name('levels.storeCKEditorImages');
    Route::post('levels/parse-csv-import', 'LevelController@parseCsvImport')->name('levels.parseCsvImport');
    Route::post('levels/process-csv-import', 'LevelController@processCsvImport')->name('levels.processCsvImport');
    Route::resource('levels', 'LevelController');

    // Level Object
    Route::delete('level-objects/destroy', 'LevelObjectController@massDestroy')->name('level-objects.massDestroy');
    Route::post('level-objects/media', 'LevelObjectController@storeMedia')->name('level-objects.storeMedia');
    Route::post('level-objects/ckmedia', 'LevelObjectController@storeCKEditorImages')->name('level-objects.storeCKEditorImages');
    Route::post('level-objects/parse-csv-import', 'LevelObjectController@parseCsvImport')->name('level-objects.parseCsvImport');
    Route::post('level-objects/process-csv-import', 'LevelObjectController@processCsvImport')->name('level-objects.processCsvImport');
    Route::resource('level-objects', 'LevelObjectController');

    // Coupon
    Route::delete('coupons/destroy', 'CouponController@massDestroy')->name('coupons.massDestroy');
    Route::post('coupons/media', 'CouponController@storeMedia')->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', 'CouponController@storeCKEditorImages')->name('coupons.storeCKEditorImages');
    Route::post('coupons/parse-csv-import', 'CouponController@parseCsvImport')->name('coupons.parseCsvImport');
    Route::post('coupons/process-csv-import', 'CouponController@processCsvImport')->name('coupons.processCsvImport');
    Route::resource('coupons', 'CouponController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Product Categories
    Route::resource('product-categories', 'ProductCategoriesController');
    Route::get('product-categories/edit/{id}', 'ProductCategoriesController@edit')->name('product-categories.editcategories');

    // Dynamic Coupon
    Route::delete('dynamic-coupons/destroy', 'DynamicCouponController@massDestroy')->name('dynamic-coupons.massDestroy');
    Route::resource('dynamic-coupons', 'DynamicCouponController');

    Route::get('redeemed-dynamic-coupons', 'RedeemedDynamicCouponsController@index')->name('redeemed-dynamic-coupons.index');
    Route::get('redeemed-dynamic-coupons/create/{id}', 'RedeemedDynamicCouponsController@create')->name('redeemed-dynamic-coupons.create');
    Route::post('redeemed-dynamic-coupons/store', 'RedeemedDynamicCouponsController@store')->name('redeemed-dynamic-coupons.store');




    // Qr Code
    Route::delete('qr-codes/destroy', 'QrCodeController@massDestroy')->name('qr-codes.massDestroy');
    Route::resource('qr-codes', 'QrCodeController');
    Route::get('qr-codes/generateqr/{id}', 'UsersController@generateQrCode')->name('qr-codes.assignqr');

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
    Route::resource('questions', 'QuestionController');

    // Character
    Route::delete('characters/destroy', 'CharacterController@massDestroy')->name('characters.massDestroy');
    Route::post('characters/media', 'CharacterController@storeMedia')->name('characters.storeMedia');
    Route::post('characters/ckmedia', 'CharacterController@storeCKEditorImages')->name('characters.storeCKEditorImages');
    Route::post('characters/parse-csv-import', 'CharacterController@parseCsvImport')->name('characters.parseCsvImport');
    Route::post('characters/process-csv-import', 'CharacterController@processCsvImport')->name('characters.processCsvImport');
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

    // Dialogue
    Route::delete('dialogues/destroy', 'DialogueController@massDestroy')->name('dialogues.massDestroy');
    Route::resource('dialogues', 'DialogueController');

    // Hotspot
    Route::delete('hotspots/destroy', 'HotspotController@massDestroy')->name('hotspots.massDestroy');
    Route::resource('hotspots', 'HotspotController');

    // Language
    Route::delete('languages/destroy', 'LanguageController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguageController');

    // Blandmark Content
    Route::delete('blandmark-contents/destroy', 'BlandmarkContentController@massDestroy')->name('blandmark-contents.massDestroy');
    Route::resource('blandmark-contents', 'BlandmarkContentController');

    // Partner Description
    Route::delete('partner-descriptions/destroy', 'PartnerDescriptionController@massDestroy')->name('partner-descriptions.massDestroy');
    Route::resource('partner-descriptions', 'PartnerDescriptionController');

    // Coupon Description
    Route::delete('coupon-descriptions/destroy', 'CouponDescriptionController@massDestroy')->name('coupon-descriptions.massDestroy');
    Route::post('coupon-descriptions/media', 'CouponDescriptionController@storeMedia')->name('coupon-descriptions.storeMedia');
    Route::post('coupon-descriptions/ckmedia', 'CouponDescriptionController@storeCKEditorImages')->name('coupon-descriptions.storeCKEditorImages');
    Route::resource('coupon-descriptions', 'CouponDescriptionController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

    // Video
    Route::delete('videos/destroy', 'VideoController@massDestroy')->name('videos.massDestroy');
    Route::post('videos/parse-csv-import', 'VideoController@parseCsvImport')->name('videos.parseCsvImport');
    Route::post('videos/process-csv-import', 'VideoController@processCsvImport')->name('videos.processCsvImport');
    Route::resource('videos', 'VideoController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Selling Point
    Route::delete('selling-points/destroy', 'SellingPointController@massDestroy')->name('selling-points.massDestroy');
    Route::resource('selling-points', 'SellingPointController');

    // Feature
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::resource('features', 'FeatureController');

    // Feature Title
    Route::delete('feature-titles/destroy', 'FeatureTitleController@massDestroy')->name('feature-titles.massDestroy');
    Route::resource('feature-titles', 'FeatureTitleController');

    // Cta Form
    Route::delete('cta-forms/destroy', 'CtaFormController@massDestroy')->name('cta-forms.massDestroy');
    Route::resource('cta-forms', 'CtaFormController');

    // Contact Text
    Route::delete('contact-texts/destroy', 'ContactTextController@massDestroy')->name('contact-texts.massDestroy');
    Route::resource('contact-texts', 'ContactTextController');

    // Contact Form
    Route::delete('contact-forms/destroy', 'ContactFormController@massDestroy')->name('contact-forms.massDestroy');
    Route::resource('contact-forms', 'ContactFormController');

    // App Menu Button
    Route::delete('app-menu-buttons/destroy', 'AppMenuButtonController@massDestroy')->name('app-menu-buttons.massDestroy');
    Route::resource('app-menu-buttons', 'AppMenuButtonController');

    // App Popup
    Route::delete('app-popups/destroy', 'AppPopupController@massDestroy')->name('app-popups.massDestroy');
    Route::post('app-popups/media', 'AppPopupController@storeMedia')->name('app-popups.storeMedia');
    Route::post('app-popups/ckmedia', 'AppPopupController@storeCKEditorImages')->name('app-popups.storeCKEditorImages');
    Route::resource('app-popups', 'AppPopupController');

    // User Feedback
    Route::delete('user-feedbacks/destroy', 'UserFeedbackController@massDestroy')->name('user-feedbacks.massDestroy');
    Route::resource('user-feedbacks', 'UserFeedbackController');

    // Product Description
    Route::delete('product-descriptions/destroy', 'ProductDescriptionController@massDestroy')->name('product-descriptions.massDestroy');
    Route::post('product-descriptions/media', 'ProductDescriptionController@storeMedia')->name('product-descriptions.storeMedia');
    Route::post('product-descriptions/ckmedia', 'ProductDescriptionController@storeCKEditorImages')->name('product-descriptions.storeCKEditorImages');
    Route::resource('product-descriptions', 'ProductDescriptionController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');

    Route::resource('transactiontypes', 'TransactionTypeController');

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
    Route::post('coupons/media', 'CouponController@storeMedia')->name('coupons.storeMedia');
    Route::post('coupons/ckmedia', 'CouponController@storeCKEditorImages')->name('coupons.storeCKEditorImages');
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

    // Dialogue
    Route::delete('dialogues/destroy', 'DialogueController@massDestroy')->name('dialogues.massDestroy');
    Route::resource('dialogues', 'DialogueController');

    // Hotspot
    Route::delete('hotspots/destroy', 'HotspotController@massDestroy')->name('hotspots.massDestroy');
    Route::resource('hotspots', 'HotspotController');

    // Language
    Route::delete('languages/destroy', 'LanguageController@massDestroy')->name('languages.massDestroy');
    Route::resource('languages', 'LanguageController');

    // Blandmark Content
    Route::delete('blandmark-contents/destroy', 'BlandmarkContentController@massDestroy')->name('blandmark-contents.massDestroy');
    Route::resource('blandmark-contents', 'BlandmarkContentController');

    // Partner Description
    Route::delete('partner-descriptions/destroy', 'PartnerDescriptionController@massDestroy')->name('partner-descriptions.massDestroy');
    Route::resource('partner-descriptions', 'PartnerDescriptionController');

    // Coupon Description
    Route::delete('coupon-descriptions/destroy', 'CouponDescriptionController@massDestroy')->name('coupon-descriptions.massDestroy');
    Route::post('coupon-descriptions/media', 'CouponDescriptionController@storeMedia')->name('coupon-descriptions.storeMedia');
    Route::post('coupon-descriptions/ckmedia', 'CouponDescriptionController@storeCKEditorImages')->name('coupon-descriptions.storeCKEditorImages');
    Route::resource('coupon-descriptions', 'CouponDescriptionController');

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

    // Video
    Route::delete('videos/destroy', 'VideoController@massDestroy')->name('videos.massDestroy');
    Route::resource('videos', 'VideoController');

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Selling Point
    Route::delete('selling-points/destroy', 'SellingPointController@massDestroy')->name('selling-points.massDestroy');
    Route::resource('selling-points', 'SellingPointController');

    // Feature
    Route::delete('features/destroy', 'FeatureController@massDestroy')->name('features.massDestroy');
    Route::resource('features', 'FeatureController');

    // Feature Title
    Route::delete('feature-titles/destroy', 'FeatureTitleController@massDestroy')->name('feature-titles.massDestroy');
    Route::resource('feature-titles', 'FeatureTitleController');

    // Cta Form
    Route::delete('cta-forms/destroy', 'CtaFormController@massDestroy')->name('cta-forms.massDestroy');
    Route::resource('cta-forms', 'CtaFormController');

    // Contact Text
    Route::delete('contact-texts/destroy', 'ContactTextController@massDestroy')->name('contact-texts.massDestroy');
    Route::resource('contact-texts', 'ContactTextController');

    // Contact Form
    Route::delete('contact-forms/destroy', 'ContactFormController@massDestroy')->name('contact-forms.massDestroy');
    Route::resource('contact-forms', 'ContactFormController');

    // App Menu Button
    Route::delete('app-menu-buttons/destroy', 'AppMenuButtonController@massDestroy')->name('app-menu-buttons.massDestroy');
    Route::resource('app-menu-buttons', 'AppMenuButtonController');

    // App Popup
    Route::delete('app-popups/destroy', 'AppPopupController@massDestroy')->name('app-popups.massDestroy');
    Route::post('app-popups/media', 'AppPopupController@storeMedia')->name('app-popups.storeMedia');
    Route::post('app-popups/ckmedia', 'AppPopupController@storeCKEditorImages')->name('app-popups.storeCKEditorImages');
    Route::resource('app-popups', 'AppPopupController');

    // User Feedback
    Route::delete('user-feedbacks/destroy', 'UserFeedbackController@massDestroy')->name('user-feedbacks.massDestroy');
    Route::resource('user-feedbacks', 'UserFeedbackController');

    // Product Description
    Route::delete('product-descriptions/destroy', 'ProductDescriptionController@massDestroy')->name('product-descriptions.massDestroy');
    Route::post('product-descriptions/media', 'ProductDescriptionController@storeMedia')->name('product-descriptions.storeMedia');
    Route::post('product-descriptions/ckmedia', 'ProductDescriptionController@storeCKEditorImages')->name('product-descriptions.storeCKEditorImages');
    Route::resource('product-descriptions', 'ProductDescriptionController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
