<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCouponDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('coupon_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id', 'coupon_fk_5945495')->references('id')->on('coupons');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id', 'language_fk_5945497')->references('id')->on('languages');
        });
    }
}
