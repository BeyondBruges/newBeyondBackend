<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellingPointsTable extends Migration
{
    public function up()
    {
        Schema::create('selling_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon_code')->nullable();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
