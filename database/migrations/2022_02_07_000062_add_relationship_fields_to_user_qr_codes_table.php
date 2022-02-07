<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserQrCodesTable extends Migration
{
    public function up()
    {
        Schema::table('user_qr_codes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919745')->references('id')->on('users');
            $table->unsignedBigInteger('qr_id')->nullable();
            $table->foreign('qr_id', 'qr_fk_5919746')->references('id')->on('qr_codes');
        });
    }
}
