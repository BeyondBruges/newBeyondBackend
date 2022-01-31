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
                @can('comunication_manager_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/blogs*") ? "menu-open" : "" }} {{ request()->is("admin/notifications*") ? "menu-open" : "" }}">
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
                                    <a href="{{ route("admin.notifications.index") }}" class="nav-link {{ request()->is("admin/notifications") || request()->is("admin/notifications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-mobile-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.notification.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('game_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/levels*") ? "menu-open" : "" }} {{ request()->is("admin/level-objects*") ? "menu-open" : "" }} {{ request()->is("admin/b-land-marks*") ? "menu-open" : "" }}">
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
                    <li class="nav-item has-treeview {{ request()->is("admin/partners*") ? "menu-open" : "" }}">
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
                        </ul>
                    </li>
                @endcan
                @can('coupon_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/coupons*") ? "menu-open" : "" }} {{ request()->is("admin/dynamic-coupons*") ? "menu-open" : "" }}">
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
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }}">
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