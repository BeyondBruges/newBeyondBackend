<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDialoguesTable extends Migration
{
    public function up()
    {
        Schema::table('dialogues', function (Blueprint $table) {
            $table->unsignedBigInteger('hotspot_id')->nullable();
            $table->foreign('hotspot_id', 'hotspot_fk_5945503')->references('id')->on('hotspots');
        });
    }
}
