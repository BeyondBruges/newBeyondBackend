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
                'title' => 'partner_user_create',
            ],
            [
                'id'    => 93,
                'title' => 'partner_user_edit',
            ],
            [
                'id'    => 94,
                'title' => 'partner_user_show',
            ],
            [
                'id'    => 95,
                'title' => 'partner_user_delete',
            ],
            [
                'id'    => 96,
                'title' => 'partner_user_access',
            ],
            [
                'id'    => 97,
                'title' => 'question_create',
            ],
            [
                'id'    => 98,
                'title' => 'question_edit',
            ],
            [
                'id'    => 99,
                'title' => 'question_show',
            ],
            [
                'id'    => 100,
                'title' => 'question_delete',
            ],
            [
                'id'    => 101,
                'title' => 'question_access',
            ],
            [
                'id'    => 102,
                'title' => 'obtained_items_management_access',
            ],
            [
                'id'    => 103,
                'title' => 'character_create',
            ],
            [
                'id'    => 104,
                'title' => 'character_edit',
            ],
            [
                'id'    => 105,
                'title' => 'character_show',
            ],
            [
                'id'    => 106,
                'title' => 'character_delete',
            ],
            [
                'id'    => 107,
                'title' => 'character_access',
            ],
            [
                'id'    => 108,
                'title' => 'user_character_create',
            ],
            [
                'id'    => 109,
                'title' => 'user_character_edit',
            ],
            [
                'id'    => 110,
                'title' => 'user_character_show',
            ],
            [
                'id'    => 111,
                'title' => 'user_character_delete',
            ],
            [
                'id'    => 112,
                'title' => 'user_character_access',
            ],
            [
                'id'    => 113,
                'title' => 'user_landmark_create',
            ],
            [
                'id'    => 114,
                'title' => 'user_landmark_edit',
            ],
            [
                'id'    => 115,
                'title' => 'user_landmark_show',
            ],
            [
                'id'    => 116,
                'title' => 'user_landmark_delete',
            ],
            [
                'id'    => 117,
                'title' => 'user_landmark_access',
            ],
            [
                'id'    => 118,
                'title' => 'user_level_create',
            ],
            [
                'id'    => 119,
                'title' => 'user_level_edit',
            ],
            [
                'id'    => 120,
                'title' => 'user_level_show',
            ],
            [
                'id'    => 121,
                'title' => 'user_level_delete',
            ],
            [
                'id'    => 122,
                'title' => 'user_level_access',
            ],
            [
                'id'    => 123,
                'title' => 'user_qr_code_create',
            ],
            [
                'id'    => 124,
                'title' => 'user_qr_code_edit',
            ],
            [
                'id'    => 125,
                'title' => 'user_qr_code_show',
            ],
            [
                'id'    => 126,
                'title' => 'user_qr_code_delete',
            ],
            [
                'id'    => 127,
                'title' => 'user_qr_code_access',
            ],
            [
                'id'    => 128,
                'title' => 'user_transaction_create',
            ],
            [
                'id'    => 129,
                'title' => 'user_transaction_edit',
            ],
            [
                'id'    => 130,
                'title' => 'user_transaction_show',
            ],
            [
                'id'    => 131,
                'title' => 'user_transaction_delete',
            ],
            [
                'id'    => 132,
                'title' => 'user_transaction_access',
            ],
            [
                'id'    => 133,
                'title' => 'user_coupon_create',
            ],
            [
                'id'    => 134,
                'title' => 'user_coupon_edit',
            ],
            [
                'id'    => 135,
                'title' => 'user_coupon_show',
            ],
            [
                'id'    => 136,
                'title' => 'user_coupon_delete',
            ],
            [
                'id'    => 137,
                'title' => 'user_coupon_access',
            ],
            [
                'id'    => 138,
                'title' => 'user_dynamic_coupon_create',
            ],
            [
                'id'    => 139,
                'title' => 'user_dynamic_coupon_edit',
            ],
            [
                'id'    => 140,
                'title' => 'user_dynamic_coupon_show',
            ],
            [
                'id'    => 141,
                'title' => 'user_dynamic_coupon_delete',
            ],
            [
                'id'    => 142,
                'title' => 'user_dynamic_coupon_access',
            ],
            [
                'id'    => 143,
                'title' => 'user_level_object_create',
            ],
            [
                'id'    => 144,
                'title' => 'user_level_object_edit',
            ],
            [
                'id'    => 145,
                'title' => 'user_level_object_show',
            ],
            [
                'id'    => 146,
                'title' => 'user_level_object_delete',
            ],
            [
                'id'    => 147,
                'title' => 'user_level_object_access',
            ],
            [
                'id'    => 148,
                'title' => 'user_level_question_create',
            ],
            [
                'id'    => 149,
                'title' => 'user_level_question_edit',
            ],
            [
                'id'    => 150,
                'title' => 'user_level_question_show',
            ],
            [
                'id'    => 151,
                'title' => 'user_level_question_delete',
            ],
            [
                'id'    => 152,
                'title' => 'user_level_question_access',
            ],
            [
                'id'    => 153,
                'title' => 'dialogue_management_access',
            ],
            [
                'id'    => 154,
                'title' => 'dialogue_create',
            ],
            [
                'id'    => 155,
                'title' => 'dialogue_edit',
            ],
            [
                'id'    => 156,
                'title' => 'dialogue_show',
            ],
            [
                'id'    => 157,
                'title' => 'dialogue_delete',
            ],
            [
                'id'    => 158,
                'title' => 'dialogue_access',
            ],
            [
                'id'    => 159,
                'title' => 'hotspot_create',
            ],
            [
                'id'    => 160,
                'title' => 'hotspot_edit',
            ],
            [
                'id'    => 161,
                'title' => 'hotspot_show',
            ],
            [
                'id'    => 162,
                'title' => 'hotspot_delete',
            ],
            [
                'id'    => 163,
                'title' => 'hotspot_access',
            ],
            [
                'id'    => 164,
                'title' => 'language_management_access',
            ],
            [
                'id'    => 165,
                'title' => 'language_create',
            ],
            [
                'id'    => 166,
                'title' => 'language_edit',
            ],
            [
                'id'    => 167,
                'title' => 'language_show',
            ],
            [
                'id'    => 168,
                'title' => 'language_delete',
            ],
            [
                'id'    => 169,
                'title' => 'language_access',
            ],
            [
                'id'    => 170,
                'title' => 'blandmark_content_create',
            ],
            [
                'id'    => 171,
                'title' => 'blandmark_content_edit',
            ],
            [
                'id'    => 172,
                'title' => 'blandmark_content_show',
            ],
            [
                'id'    => 173,
                'title' => 'blandmark_content_delete',
            ],
            [
                'id'    => 174,
                'title' => 'blandmark_content_access',
            ],
            [
                'id'    => 175,
                'title' => 'partner_description_create',
            ],
            [
                'id'    => 176,
                'title' => 'partner_description_edit',
            ],
            [
                'id'    => 177,
                'title' => 'partner_description_show',
            ],
            [
                'id'    => 178,
                'title' => 'partner_description_delete',
            ],
            [
                'id'    => 179,
                'title' => 'partner_description_access',
            ],
            [
                'id'    => 180,
                'title' => 'coupon_description_create',
            ],
            [
                'id'    => 181,
                'title' => 'coupon_description_edit',
            ],
            [
                'id'    => 182,
                'title' => 'coupon_description_show',
            ],
            [
                'id'    => 183,
                'title' => 'coupon_description_delete',
            ],
            [
                'id'    => 184,
                'title' => 'coupon_description_access',
            ],
            [
                'id'    => 185,
                'title' => 'landing_page_management_access',
            ],
            [
                'id'    => 186,
                'title' => 'company_create',
            ],
            [
                'id'    => 187,
                'title' => 'company_edit',
            ],
            [
                'id'    => 188,
                'title' => 'company_show',
            ],
            [
                'id'    => 189,
                'title' => 'company_delete',
            ],
            [
                'id'    => 190,
                'title' => 'company_access',
            ],
            [
                'id'    => 191,
                'title' => 'settings_management_access',
            ],
            [
                'id'    => 192,
                'title' => 'video_create',
            ],
            [
                'id'    => 193,
                'title' => 'video_edit',
            ],
            [
                'id'    => 194,
                'title' => 'video_show',
            ],
            [
                'id'    => 195,
                'title' => 'video_delete',
            ],
            [
                'id'    => 196,
                'title' => 'video_access',
            ],
            [
                'id'    => 197,
                'title' => 'slider_create',
            ],
            [
                'id'    => 198,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 199,
                'title' => 'slider_show',
            ],
            [
                'id'    => 200,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 201,
                'title' => 'slider_access',
            ],
            [
                'id'    => 202,
                'title' => 'selling_point_create',
            ],
            [
                'id'    => 203,
                'title' => 'selling_point_edit',
            ],
            [
                'id'    => 204,
                'title' => 'selling_point_show',
            ],
            [
                'id'    => 205,
                'title' => 'selling_point_delete',
            ],
            [
                'id'    => 206,
                'title' => 'selling_point_access',
            ],
            [
                'id'    => 207,
                'title' => 'feature_create',
            ],
            [
                'id'    => 208,
                'title' => 'feature_edit',
            ],
            [
                'id'    => 209,
                'title' => 'feature_show',
            ],
            [
                'id'    => 210,
                'title' => 'feature_delete',
            ],
            [
                'id'    => 211,
                'title' => 'feature_access',
            ],
            [
                'id'    => 212,
                'title' => 'feature_title_create',
            ],
            [
                'id'    => 213,
                'title' => 'feature_title_edit',
            ],
            [
                'id'    => 214,
                'title' => 'feature_title_show',
            ],
            [
                'id'    => 215,
                'title' => 'feature_title_delete',
            ],
            [
                'id'    => 216,
                'title' => 'feature_title_access',
            ],
            [
                'id'    => 217,
                'title' => 'cta_form_create',
            ],
            [
                'id'    => 218,
                'title' => 'cta_form_edit',
            ],
            [
                'id'    => 219,
                'title' => 'cta_form_show',
            ],
            [
                'id'    => 220,
                'title' => 'cta_form_delete',
            ],
            [
                'id'    => 221,
                'title' => 'cta_form_access',
            ],
            [
                'id'    => 222,
                'title' => 'contact_text_create',
            ],
            [
                'id'    => 223,
                'title' => 'contact_text_edit',
            ],
            [
                'id'    => 224,
                'title' => 'contact_text_show',
            ],
            [
                'id'    => 225,
                'title' => 'contact_text_delete',
            ],
            [
                'id'    => 226,
                'title' => 'contact_text_access',
            ],
            [
                'id'    => 227,
                'title' => 'contact_form_create',
            ],
            [
                'id'    => 228,
                'title' => 'contact_form_edit',
            ],
            [
                'id'    => 229,
                'title' => 'contact_form_show',
            ],
            [
                'id'    => 230,
                'title' => 'contact_form_delete',
            ],
            [
                'id'    => 231,
                'title' => 'contact_form_access',
            ],
            [
                'id'    => 232,
                'title' => 'app_menu_button_create',
            ],
            [
                'id'    => 233,
                'title' => 'app_menu_button_edit',
            ],
            [
                'id'    => 234,
                'title' => 'app_menu_button_show',
            ],
            [
                'id'    => 235,
                'title' => 'app_menu_button_delete',
            ],
            [
                'id'    => 236,
                'title' => 'app_menu_button_access',
            ],
            [
                'id'    => 237,
                'title' => 'app_popup_create',
            ],
            [
                'id'    => 238,
                'title' => 'app_popup_edit',
            ],
            [
                'id'    => 239,
                'title' => 'app_popup_show',
            ],
            [
                'id'    => 240,
                'title' => 'app_popup_delete',
            ],
            [
                'id'    => 241,
                'title' => 'app_popup_access',
            ],
            [
                'id'    => 242,
                'title' => 'user_feedback_create',
            ],
            [
                'id'    => 243,
                'title' => 'user_feedback_edit',
            ],
            [
                'id'    => 244,
                'title' => 'user_feedback_show',
            ],
            [
                'id'    => 245,
                'title' => 'user_feedback_delete',
            ],
            [
                'id'    => 246,
                'title' => 'user_feedback_access',
            ],
            [
                'id'    => 247,
                'title' => 'product_description_create',
            ],
            [
                'id'    => 248,
                'title' => 'product_description_edit',
            ],
            [
                'id'    => 249,
                'title' => 'product_description_show',
            ],
            [
                'id'    => 250,
                'title' => 'product_description_delete',
            ],
            [
                'id'    => 251,
                'title' => 'product_description_access',
            ],
            [
                'id'    => 252,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
