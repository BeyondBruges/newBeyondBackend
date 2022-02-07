<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('google_analyitics')->nullable();
            $table->string('sendinblue_user')->nullable();
            $table->string('sendinblue_password')->nullable();
            $table->string('onesignal_appid')->nullable();
            $table->string('onesignal_apikey')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
