<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDynamicCouponsTable extends Migration
{
    public function up()
    {
        Schema::table('dynamic_coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5895710')->references('id')->on('users');
        });
    }
}
