<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLevelObjectsTable extends Migration
{
    public function up()
    {
        Schema::table('level_objects', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id', 'level_fk_5895651')->references('id')->on('levels');
        });
    }
}
