<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_level_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('result');
            $table->softDeletes();
        });
    }
}
