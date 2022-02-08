<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('user_feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
