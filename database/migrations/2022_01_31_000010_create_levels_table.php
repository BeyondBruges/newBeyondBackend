<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->float('lat', 15, 2);
            $table->float('lng', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
