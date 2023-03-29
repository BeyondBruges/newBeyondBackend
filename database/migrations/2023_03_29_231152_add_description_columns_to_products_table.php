<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->longText('en_title')->nullable();
            $table->longText('es_title')->nullable();
            $table->longText('nl_title')->nullable();
            $table->longText('fr_title')->nullable();
            $table->longText('en_description')->nullable();
            $table->longText('es_description')->nullable();
            $table->longText('nl_description')->nullable();
            $table->longText('fr_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
