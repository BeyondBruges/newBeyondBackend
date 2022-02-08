<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserLevelObjectsTable extends Migration
{
    public function up()
    {
        Schema::table('user_level_objects', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919789')->references('id')->on('users');
            $table->unsignedBigInteger('level_object_id')->nullable();
            $table->foreign('level_object_id', 'level_object_fk_5919790')->references('id')->on('level_objects');
        });
    }
}
