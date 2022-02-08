<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('product_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->integer('language')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
