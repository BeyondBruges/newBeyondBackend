<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnalyticsTable extends Migration
{
    public function up()
    {
        Schema::table('analytics', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_5895607')->references('id')->on('analytic_types');
        });
    }
}
