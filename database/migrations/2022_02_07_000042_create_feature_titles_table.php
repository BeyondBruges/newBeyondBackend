<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureTitlesTable extends Migration
{
    public function up()
    {
        Schema::create('feature_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
