<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserDynamicCouponsTable extends Migration
{
    public function up()
    {
        Schema::table('user_dynamic_coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919777')->references('id')->on('users');
            $table->unsignedBigInteger('dynamic_coupon_id')->nullable();
            $table->foreign('dynamic_coupon_id', 'dynamic_coupon_fk_5919778')->references('id')->on('dynamic_coupons');
        });
    }
}
