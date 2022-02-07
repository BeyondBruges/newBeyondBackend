<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtaFormsTable extends Migration
{
    public function up()
    {
        Schema::create('cta_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('inputfield_text')->nullable();
            $table->string('button_text')->nullable();
            $table->string('legends_title')->nullable();
            $table->string('legends_subtitle')->nullable();
            $table->string('legends_link')->nullable();
            $table->string('legends_button_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
