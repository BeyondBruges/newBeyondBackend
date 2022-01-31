<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'analytics_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'analytic_type_create',
            ],
            [
                'id'    => 21,
                'title' => 'analytic_type_edit',
            ],
            [
                'id'    => 22,
                'title' => 'analytic_type_show',
            ],
            [
                'id'    => 23,
                'title' => 'analytic_type_delete',
            ],
            [
                'id'    => 24,
                'title' => 'analytic_type_access',
            ],
            [
                'id'    => 25,
                'title' => 'analytic_create',
            ],
            [
                'id'    => 26,
                'title' => 'analytic_edit',
            ],
            [
                'id'    => 27,
                'title' => 'analytic_show',
            ],
            [
                'id'    => 28,
                'title' => 'analytic_delete',
            ],
            [
                'id'    => 29,
                'title' => 'analytic_access',
            ],
            [
                'id'    => 30,
                'title' => 'transaction_management_access',
            ],
            [
                'id'    => 31,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 32,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 33,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 34,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 35,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 36,
                'title' => 'partners_management_access',
            ],
            [
                'id'    => 37,
                'title' => 'partner_create',
            ],
            [
                'id'    => 38,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 39,
                'title' => 'partner_show',
            ],
            [
                'id'    => 40,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 41,
                'title' => 'partner_access',
            ],
            [
                'id'    => 42,
                'title' => 'game_management_access',
            ],
            [
                'id'    => 43,
                'title' => 'level_create',
            ],
            [
                'id'    => 44,
                'title' => 'level_edit',
            ],
            [
                'id'    => 45,
                'title' => 'level_show',
            ],
            [
                'id'    => 46,
                'title' => 'level_delete',
            ],
            [
                'id'    => 47,
                'title' => 'level_access',
            ],
            [
                'id'    => 48,
                'title' => 'level_object_create',
            ],
            [
                'id'    => 49,
                'title' => 'level_object_edit',
            ],
            [
                'id'    => 50,
                'title' => 'level_object_show',
            ],
            [
                'id'    => 51,
                'title' => 'level_object_delete',
            ],
            [
                'id'    => 52,
                'title' => 'level_object_access',
            ],
            [
                'id'    => 53,
                'title' => 'coupon_management_access',
            ],
            [
                'id'    => 54,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 55,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 56,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 57,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 58,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 59,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 60,
                'title' => 'product_create',
            ],
            [
                'id'    => 61,
                'title' => 'product_edit',
            ],
            [
                'id'    => 62,
                'title' => 'product_show',
            ],
            [
                'id'    => 63,
                'title' => 'product_delete',
            ],
            [
                'id'    => 64,
                'title' => 'product_access',
            ],
            [
                'id'    => 65,
                'title' => 'dynamic_coupon_create',
            ],
            [
                'id'    => 66,
                'title' => 'dynamic_coupon_edit',
            ],
            [
                'id'    => 67,
                'title' => 'dynamic_coupon_show',
            ],
            [
                'id'    => 68,
                'title' => 'dynamic_coupon_delete',
            ],
            [
                'id'    => 69,
                'title' => 'dynamic_coupon_access',
            ],
            [
                'id'    => 70,
                'title' => 'qr_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'qr_code_create',
            ],
            [
                'id'    => 72,
                'title' => 'qr_code_edit',
            ],
            [
                'id'    => 73,
                'title' => 'qr_code_show',
            ],
            [
                'id'    => 74,
                'title' => 'qr_code_delete',
            ],
            [
                'id'    => 75,
                'title' => 'qr_code_access',
            ],
            [
                'id'    => 76,
                'title' => 'b_land_mark_create',
            ],
            [
                'id'    => 77,
                'title' => 'b_land_mark_edit',
            ],
            [
                'id'    => 78,
                'title' => 'b_land_mark_show',
            ],
            [
                'id'    => 79,
                'title' => 'b_land_mark_delete',
            ],
            [
                'id'    => 80,
                'title' => 'b_land_mark_access',
            ],
            [
                'id'    => 81,
                'title' => 'comunication_manager_access',
            ],
            [
                'id'    => 82,
                'title' => 'blog_create',
            ],
            [
                'id'    => 83,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 84,
                'title' => 'blog_show',
            ],
            [
                'id'    => 85,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 86,
                'title' => 'blog_access',
            ],
            [
                'id'    => 87,
                'title' => 'notification_create',
            ],
            [
                'id'    => 88,
                'title' => 'notification_edit',
            ],
            [
                'id'    => 89,
                'title' => 'notification_show',
            ],
            [
                'id'    => 90,
                'title' => 'notification_delete',
            ],
            [
                'id'    => 91,
                'title' => 'notification_access',
            ],
            [
                'id'    => 92,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
