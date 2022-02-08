<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFeatureTitlesTable extends Migration
{
    public function up()
    {
        Schema::table('feature_titles', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id', 'language_fk_5945627')->references('id')->on('languages');
        });
    }
}
