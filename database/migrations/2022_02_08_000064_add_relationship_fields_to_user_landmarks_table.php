<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserLandmarksTable extends Migration
{
    public function up()
    {
        Schema::table('user_landmarks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919618')->references('id')->on('users');
            $table->unsignedBigInteger('landmark_id')->nullable();
            $table->foreign('landmark_id', 'landmark_fk_5919619')->references('id')->on('b_land_marks');
        });
    }
}
