<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('button_2_text')->nullable();
            $table->string('button_2_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
