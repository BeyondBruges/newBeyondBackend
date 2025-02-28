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
            $table->float('lat', 15, 8);
            $table->float('lng', 15, 8);
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
