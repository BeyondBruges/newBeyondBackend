<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('settings_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.settingsManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('company_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.companies.index') }}">
                                            {{ trans('cruds.company.title') }}
                                        </a>
                                    @endcan
                                    @can('app_menu_button_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.app-menu-buttons.index') }}">
                                            {{ trans('cruds.appMenuButton.title') }}
                                        </a>
                                    @endcan
                                    @can('app_popup_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.app-popups.index') }}">
                                            {{ trans('cruds.appPopup.title') }}
                                        </a>
                                    @endcan
                                    @can('comunication_manager_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.comunicationManager.title') }}
                                        </a>
                                    @endcan
                                    @can('blog_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.blogs.index') }}">
                                            {{ trans('cruds.blog.title') }}
                                        </a>
                                    @endcan
                                    @can('notification_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.notifications.index') }}">
                                            {{ trans('cruds.notification.title') }}
                                        </a>
                                    @endcan
                                    @can('user_feedback_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-feedbacks.index') }}">
                                            {{ trans('cruds.userFeedback.title') }}
                                        </a>
                                    @endcan
                                    @can('game_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.gameManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('level_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.levels.index') }}">
                                            {{ trans('cruds.level.title') }}
                                        </a>
                                    @endcan
                                    @can('level_object_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.level-objects.index') }}">
                                            {{ trans('cruds.levelObject.title') }}
                                        </a>
                                    @endcan
                                    @can('b_land_mark_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.b-land-marks.index') }}">
                                            {{ trans('cruds.bLandMark.title') }}
                                        </a>
                                    @endcan
                                    @can('blandmark_content_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.blandmark-contents.index') }}">
                                            {{ trans('cruds.blandmarkContent.title') }}
                                        </a>
                                    @endcan
                                    @can('question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.questions.index') }}">
                                            {{ trans('cruds.question.title') }}
                                        </a>
                                    @endcan
                                    @can('character_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.characters.index') }}">
                                            {{ trans('cruds.character.title') }}
                                        </a>
                                    @endcan
                                    @can('hotspot_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.hotspots.index') }}">
                                            {{ trans('cruds.hotspot.title') }}
                                        </a>
                                    @endcan
                                    @can('dialogue_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.dialogueManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('dialogue_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.dialogues.index') }}">
                                            {{ trans('cruds.dialogue.title') }}
                                        </a>
                                    @endcan
                                    @can('transaction_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.transactionManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('transaction_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.transactions.index') }}">
                                            {{ trans('cruds.transaction.title') }}
                                        </a>
                                    @endcan
                                    @can('analytics_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.analyticsManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('analytic_type_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.analytic-types.index') }}">
                                            {{ trans('cruds.analyticType.title') }}
                                        </a>
                                    @endcan
                                    @can('analytic_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.analytics.index') }}">
                                            {{ trans('cruds.analytic.title') }}
                                        </a>
                                    @endcan
                                    @can('partners_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.partnersManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('partner_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.partners.index') }}">
                                            {{ trans('cruds.partner.title') }}
                                        </a>
                                    @endcan
                                    @can('partner_user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.partner-users.index') }}">
                                            {{ trans('cruds.partnerUser.title') }}
                                        </a>
                                    @endcan
                                    @can('partner_description_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.partner-descriptions.index') }}">
                                            {{ trans('cruds.partnerDescription.title') }}
                                        </a>
                                    @endcan
                                    @can('coupon_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.couponManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('coupon_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.coupons.index') }}">
                                            {{ trans('cruds.coupon.title') }}
                                        </a>
                                    @endcan
                                    @can('coupon_description_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.coupon-descriptions.index') }}">
                                            {{ trans('cruds.couponDescription.title') }}
                                        </a>
                                    @endcan
                                    @can('dynamic_coupon_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.dynamic-coupons.index') }}">
                                            {{ trans('cruds.dynamicCoupon.title') }}
                                        </a>
                                    @endcan
                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('product_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.productManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('product_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.products.index') }}">
                                            {{ trans('cruds.product.title') }}
                                        </a>
                                    @endcan
                                    @can('product_description_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.product-descriptions.index') }}">
                                            {{ trans('cruds.productDescription.title') }}
                                        </a>
                                    @endcan
                                    @can('qr_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.qrManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('qr_code_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.qr-codes.index') }}">
                                            {{ trans('cruds.qrCode.title') }}
                                        </a>
                                    @endcan
                                    @can('obtained_items_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.obtainedItemsManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('user_character_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-characters.index') }}">
                                            {{ trans('cruds.userCharacter.title') }}
                                        </a>
                                    @endcan
                                    @can('user_level_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-levels.index') }}">
                                            {{ trans('cruds.userLevel.title') }}
                                        </a>
                                    @endcan
                                    @can('user_landmark_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-landmarks.index') }}">
                                            {{ trans('cruds.userLandmark.title') }}
                                        </a>
                                    @endcan
                                    @can('user_qr_code_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-qr-codes.index') }}">
                                            {{ trans('cruds.userQrCode.title') }}
                                        </a>
                                    @endcan
                                    @can('user_transaction_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-transactions.index') }}">
                                            {{ trans('cruds.userTransaction.title') }}
                                        </a>
                                    @endcan
                                    @can('user_coupon_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-coupons.index') }}">
                                            {{ trans('cruds.userCoupon.title') }}
                                        </a>
                                    @endcan
                                    @can('user_dynamic_coupon_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-dynamic-coupons.index') }}">
                                            {{ trans('cruds.userDynamicCoupon.title') }}
                                        </a>
                                    @endcan
                                    @can('user_level_object_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-level-objects.index') }}">
                                            {{ trans('cruds.userLevelObject.title') }}
                                        </a>
                                    @endcan
                                    @can('user_level_question_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.user-level-questions.index') }}">
                                            {{ trans('cruds.userLevelQuestion.title') }}
                                        </a>
                                    @endcan
                                    @can('language_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.languageManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('language_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.languages.index') }}">
                                            {{ trans('cruds.language.title') }}
                                        </a>
                                    @endcan
                                    @can('landing_page_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.landingPageManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('video_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.videos.index') }}">
                                            {{ trans('cruds.video.title') }}
                                        </a>
                                    @endcan
                                    @can('slider_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.sliders.index') }}">
                                            {{ trans('cruds.slider.title') }}
                                        </a>
                                    @endcan
                                    @can('selling_point_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.selling-points.index') }}">
                                            {{ trans('cruds.sellingPoint.title') }}
                                        </a>
                                    @endcan
                                    @can('feature_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.features.index') }}">
                                            {{ trans('cruds.feature.title') }}
                                        </a>
                                    @endcan
                                    @can('feature_title_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.feature-titles.index') }}">
                                            {{ trans('cruds.featureTitle.title') }}
                                        </a>
                                    @endcan
                                    @can('cta_form_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.cta-forms.index') }}">
                                            {{ trans('cruds.ctaForm.title') }}
                                        </a>
                                    @endcan
                                    @can('contact_text_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.contact-texts.index') }}">
                                            {{ trans('cruds.contactText.title') }}
                                        </a>
                                    @endcan
                                    @can('contact_form_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.contact-forms.index') }}">
                                            {{ trans('cruds.contactForm.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>