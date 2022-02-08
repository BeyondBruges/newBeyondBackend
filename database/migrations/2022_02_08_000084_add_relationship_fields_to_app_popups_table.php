<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppPopupsTable extends Migration
{
    public function up()
    {
        Schema::table('app_popups', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id', 'language_fk_5945853')->references('id')->on('languages');
        });
    }
}
