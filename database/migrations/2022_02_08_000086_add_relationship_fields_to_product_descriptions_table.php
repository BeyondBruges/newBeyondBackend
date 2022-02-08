<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('product_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_5946961')->references('id')->on('products');
        });
    }
}
