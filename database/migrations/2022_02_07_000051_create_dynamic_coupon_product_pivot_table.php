<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicCouponProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('dynamic_coupon_product', function (Blueprint $table) {
            $table->unsignedBigInteger('dynamic_coupon_id');
            $table->foreign('dynamic_coupon_id', 'dynamic_coupon_id_fk_5897008')->references('id')->on('dynamic_coupons')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_5897008')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
