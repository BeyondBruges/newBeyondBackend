<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTextsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
