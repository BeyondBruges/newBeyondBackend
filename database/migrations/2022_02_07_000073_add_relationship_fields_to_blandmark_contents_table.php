<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBlandmarkContentsTable extends Migration
{
    public function up()
    {
        Schema::table('blandmark_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('landmark_id')->nullable();
            $table->foreign('landmark_id', 'landmark_fk_5945433')->references('id')->on('b_land_marks');
        });
    }
}
