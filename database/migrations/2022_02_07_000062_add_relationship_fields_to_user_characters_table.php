<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserCharactersTable extends Migration
{
    public function up()
    {
        Schema::table('user_characters', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5897469')->references('id')->on('users');
            $table->unsignedBigInteger('character_id')->nullable();
            $table->foreign('character_id', 'character_fk_5897470')->references('id')->on('characters');
        });
    }
}
