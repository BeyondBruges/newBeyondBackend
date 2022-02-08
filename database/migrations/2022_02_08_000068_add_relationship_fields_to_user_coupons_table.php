<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserCouponsTable extends Migration
{
    public function up()
    {
        Schema::table('user_coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919771')->references('id')->on('users');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id', 'coupon_fk_5919772')->references('id')->on('coupons');
        });
    }
}
