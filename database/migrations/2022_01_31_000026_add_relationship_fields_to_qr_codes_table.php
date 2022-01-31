<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQrCodesTable extends Migration
{
    public function up()
    {
        Schema::table('qr_codes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5895720')->references('id')->on('users');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_5895721')->references('id')->on('partners');
        });
    }
}
