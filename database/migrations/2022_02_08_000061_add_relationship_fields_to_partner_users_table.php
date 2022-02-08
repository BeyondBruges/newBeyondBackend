<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartnerUsersTable extends Migration
{
    public function up()
    {
        Schema::table('partner_users', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_5896768')->references('id')->on('partners');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5896769')->references('id')->on('users');
        });
    }
}
