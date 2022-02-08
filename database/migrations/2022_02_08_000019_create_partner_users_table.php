<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerUsersTable extends Migration
{
    public function up()
    {
        Schema::create('partner_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
