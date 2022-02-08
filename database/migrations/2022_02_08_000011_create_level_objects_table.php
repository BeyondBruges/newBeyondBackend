<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelObjectsTable extends Migration
{
    public function up()
    {
        Schema::create('level_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('description');
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
