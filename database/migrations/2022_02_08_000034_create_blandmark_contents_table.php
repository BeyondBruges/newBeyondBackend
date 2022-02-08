<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlandmarkContentsTable extends Migration
{
    public function up()
    {
        Schema::create('blandmark_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
