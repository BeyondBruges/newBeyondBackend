<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBLandMarksTable extends Migration
{
    public function up()
    {
        Schema::create('b_land_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('address');
            $table->float('lat', 15, 8);
            $table->float('lng', 15, 8);
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
