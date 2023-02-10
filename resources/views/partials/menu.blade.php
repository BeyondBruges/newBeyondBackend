<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('settings_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/companies*") ? "menu-open" : "" }} {{ request()->is("admin/app-menu-buttons*") ? "menu-open" : "" }} {{ request()->is("admin/app-popups*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.settingsManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('company_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is("admin/companies") || request()->is("admin/companies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-pied-piper-hat">

                                        </i>
                                        <p>
                                            {{ trans('cruds.company.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('app_menu_button_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.app-menu-buttons.index") }}" class="nav-link {{ request()->is("admin/app-menu-buttons") || request()->is("admin/app-menu-buttons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tablet-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.appMenuButton.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('app_popup_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.app-popups.index") }}" class="nav-link {{ request()->is("admin/app-popups") || request()->is("admin/app-popups/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-mobile-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.appPopup.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('comunication_manager_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/blogs*") ? "menu-open" : "" }} {{ request()->is("admin/push-notifications*") ? "menu-open" : "" }} {{ request()->is("admin/user-feedbacks*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-comment">

                            </i>
                            <p>
                                {{ trans('cruds.comunicationManager.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('blog_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blogs.index") }}" class="nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-rss">

                                        </i>
                                        <p>
                                            {{ trans('cruds.blog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('notification_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.push-notifications.index") }}" class="nav-link {{ request()->is("admin/push-notifications") || request()->is("admin/push-notifications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-mobile-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.notification.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_feedback_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-feedbacks.index") }}" class="nav-link {{ request()->is("admin/user-feedbacks") || request()->is("admin/user-feedbacks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userFeedback.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('game_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/levels*") ? "menu-open" : "" }} {{ request()->is("admin/level-objects*") ? "menu-open" : "" }} {{ request()->is("admin/b-land-marks*") ? "menu-open" : "" }} {{ request()->is("admin/blandmark-contents*") ? "menu-open" : "" }} {{ request()->is("admin/questions*") ? "menu-open" : "" }} {{ request()->is("admin/characters*") ? "menu-open" : "" }} {{ request()->is("admin/hotspots*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-gamepad">

                            </i>
                            <p>
                                {{ trans('cruds.gameManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('level_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.levels.index") }}" class="nav-link {{ request()->is("admin/levels") || request()->is("admin/levels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dice">

                                        </i>
                                        <p>
                                            {{ trans('cruds.level.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <a href="{{ route("admin.side-quests.index") }}" class="nav-link {{ request()->is("admin/side-quests") || request()->is("admin/side-quests/*") ? "active" : "" }}">
                                    <i class="fa-fw nav-icon fas fa-chess">

                                    </i>
                                    <p>
                                        Side Quests
                                    </p>
                                </a>
                            </li>

                            @can('level_object_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.level-objects.index") }}" class="nav-link {{ request()->is("admin/level-objects") || request()->is("admin/level-objects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-object-ungroup">

                                        </i>
                                        <p>
                                            {{ trans('cruds.levelObject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('b_land_mark_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.b-land-marks.index") }}" class="nav-link {{ request()->is("admin/b-land-marks") || request()->is("admin/b-land-marks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bLandMark.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('blandmark_content_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.blandmark-contents.index") }}" class="nav-link {{ request()->is("admin/blandmark-contents") || request()->is("admin/blandmark-contents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.blandmarkContent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.question.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('character_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.characters.index") }}" class="nav-link {{ request()->is("admin/characters") || request()->is("admin/characters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.character.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hotspot_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hotspots.index") }}" class="nav-link {{ request()->is("admin/hotspots") || request()->is("admin/hotspots/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-pin">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hotspot.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('dialogue_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/dialogues*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-comments">

                            </i>
                            <p>
                                {{ trans('cruds.dialogueManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('dialogue_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dialogues.index") }}" class="nav-link {{ request()->is("admin/dialogues") || request()->is("admin/dialogues/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-comment-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dialogue.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('transaction_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/transactions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.transactionManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('analytics_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/analytic-types*") ? "menu-open" : "" }} {{ request()->is("admin/analytics*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-chart-line">

                            </i>
                            <p>
                                {{ trans('cruds.analyticsManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('analytic_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.analytic-types.index") }}" class="nav-link {{ request()->is("admin/analytic-types") || request()->is("admin/analytic-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-pie">

                                        </i>
                                        <p>
                                            {{ trans('cruds.analyticType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('analytic_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.analytics.index") }}" class="nav-link {{ request()->is("admin/analytics") || request()->is("admin/analytics/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-area">

                                        </i>
                                        <p>
                                            {{ trans('cruds.analytic.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('partners_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/partners*") ? "menu-open" : "" }} {{ request()->is("admin/partner-users*") ? "menu-open" : "" }} {{ request()->is("admin/partner-descriptions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-store-alt">

                            </i>
                            <p>
                                {{ trans('cruds.partnersManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('partner_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partners.index") }}" class="nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-store-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partner.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partner_user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partner-users.index") }}" class="nav-link {{ request()->is("admin/partner-users") || request()->is("admin/partner-users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-edit">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerUser.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('partner_description_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.partner-descriptions.index") }}" class="nav-link {{ request()->is("admin/partner-descriptions") || request()->is("admin/partner-descriptions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-app-store-ios">

                                        </i>
                                        <p>
                                            {{ trans('cruds.partnerDescription.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('coupon_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/coupons*") ? "menu-open" : "" }} {{ request()->is("admin/coupon-descriptions*") ? "menu-open" : "" }} {{ request()->is("admin/dynamic-coupons*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-ticket-alt">

                            </i>
                            <p>
                                {{ trans('cruds.couponManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.coupons.index") }}" class="nav-link {{ request()->is("admin/coupons") || request()->is("admin/coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.coupon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('coupon_description_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.coupon-descriptions.index") }}" class="nav-link {{ request()->is("admin/coupon-descriptions") || request()->is("admin/coupon-descriptions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.couponDescription.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dynamic_coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dynamic-coupons.index") }}" class="nav-link {{ request()->is("admin/dynamic-coupons") || request()->is("admin/dynamic-coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dynamicCoupon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('redeemed_dynamic_coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.redeemed-dynamic-coupons.index") }}" class="nav-link {{ request()->is("admin/redeemed-dynamic-coupons") || request()->is("admin/redeemed-dynamic-coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            Redeemed Dynamic Coupons
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('audit_log_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-file-alt">

                            </i>
                            <p>
                                {{ trans('cruds.auditLog.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/product-categories*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-box-open">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-th">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-categories.index") }}" class="nav-link {{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-tags">

                                        </i>
                                        <p>
                                            Product Categories
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('qr_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/qr-codes*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-qrcode">

                            </i>
                            <p>
                                {{ trans('cruds.qrManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('qr_code_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.qr-codes.index") }}" class="nav-link {{ request()->is("admin/qr-codes") || request()->is("admin/qr-codes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.qrCode.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('obtained_items_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/user-characters*") ? "menu-open" : "" }} {{ request()->is("admin/user-game-levels*") ? "menu-open" : "" }} {{ request()->is("admin/user-levels*") ? "menu-open" : "" }} {{ request()->is("admin/user-landmarks*") ? "menu-open" : "" }} {{ request()->is("admin/user-qr-codes*") ? "menu-open" : "" }} {{ request()->is("admin/user-transactions*") ? "menu-open" : "" }} {{ request()->is("admin/user-coupons*") ? "menu-open" : "" }} {{ request()->is("admin/user-dynamic-coupons*") ? "menu-open" : "" }} {{ request()->is("admin/user-level-objects*") ? "menu-open" : "" }} {{ request()->is("admin/user-level-questions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-parachute-box">

                            </i>
                            <p>
                                {{ trans('cruds.obtainedItemsManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_character_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-characters.index") }}" class="nav-link {{ request()->is("admin/user-characters") || request()->is("admin/user-characters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userCharacter.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_level_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-game-levels.index") }}" class="nav-link {{ request()->is("admin/user-game-levels") || request()->is("admin/user-game-levels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-globe">

                                        </i>
                                        <p>
                                            User Game Level
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_level_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-levels.index") }}" class="nav-link {{ request()->is("admin/user-levels") || request()->is("admin/user-levels/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-globe">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userLevel.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_landmark_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-landmarks.index") }}" class="nav-link {{ request()->is("admin/user-landmarks") || request()->is("admin/user-landmarks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-street-view">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userLandmark.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_qr_code_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-qr-codes.index") }}" class="nav-link {{ request()->is("admin/user-qr-codes") || request()->is("admin/user-qr-codes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-qrcode">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userQrCode.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-transactions.index") }}" class="nav-link {{ request()->is("admin/user-transactions") || request()->is("admin/user-transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-credit-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userTransaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-coupons.index") }}" class="nav-link {{ request()->is("admin/user-coupons") || request()->is("admin/user-coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userCoupon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_dynamic_coupon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-dynamic-coupons.index") }}" class="nav-link {{ request()->is("admin/user-dynamic-coupons") || request()->is("admin/user-dynamic-coupons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ticket-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userDynamicCoupon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_level_object_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-level-objects.index") }}" class="nav-link {{ request()->is("admin/user-level-objects") || request()->is("admin/user-level-objects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-boxes">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userLevelObject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_level_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-level-questions.index") }}" class="nav-link {{ request()->is("admin/user-level-questions") || request()->is("admin/user-level-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-question-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userLevelQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan

                        <li class="nav-item">
                            <a href="{{ route("admin.user-side-quests.index") }}" class="nav-link {{ request()->is("admin/user-side-quests") || request()->is("admin/user-side-quests/*") ? "active" : "" }}">
                                <i class="fa-fw nav-icon fa fa-bolt">

                                </i>
                                <p>
                                    User SideQuest
                                </p>
                            </a>
                        </li>

                        </ul>
                    </li>
                @endcan
                @can('language_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/languages*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon far fa-flag">

                            </i>
                            <p>
                                {{ trans('cruds.languageManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('language_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.languages.index") }}" class="nav-link {{ request()->is("admin/languages") || request()->is("admin/languages/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.language.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('landing_page_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/videos*") ? "menu-open" : "" }} {{ request()->is("admin/sliders*") ? "menu-open" : "" }} {{ request()->is("admin/selling-points*") ? "menu-open" : "" }} {{ request()->is("admin/features*") ? "menu-open" : "" }} {{ request()->is("admin/feature-titles*") ? "menu-open" : "" }} {{ request()->is("admin/cta-forms*") ? "menu-open" : "" }} {{ request()->is("admin/contact-texts*") ? "menu-open" : "" }} {{ request()->is("admin/contact-forms*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.landingPageManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('video_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.videos.index") }}" class="nav-link {{ request()->is("admin/videos") || request()->is("admin/videos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.video.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('slider_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.slider.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('selling_point_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.selling-points.index") }}" class="nav-link {{ request()->is("admin/selling-points") || request()->is("admin/selling-points/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ellipsis-h">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sellingPoint.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('feature_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.features.index") }}" class="nav-link {{ request()->is("admin/features") || request()->is("admin/features/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-ellipsis-v">

                                        </i>
                                        <p>
                                            {{ trans('cruds.feature.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('feature_title_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.feature-titles.index") }}" class="nav-link {{ request()->is("admin/feature-titles") || request()->is("admin/feature-titles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-text-height">

                                        </i>
                                        <p>
                                            {{ trans('cruds.featureTitle.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cta_form_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cta-forms.index") }}" class="nav-link {{ request()->is("admin/cta-forms") || request()->is("admin/cta-forms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-tie">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ctaForm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_text_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contact-texts.index") }}" class="nav-link {{ request()->is("admin/contact-texts") || request()->is("admin/contact-texts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-at">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactText.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contact_form_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contact-forms.index") }}" class="nav-link {{ request()->is("admin/contact-forms") || request()->is("admin/contact-forms/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-envelope">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contactForm.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
