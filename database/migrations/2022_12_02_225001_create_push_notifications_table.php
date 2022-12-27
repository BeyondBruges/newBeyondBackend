<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('en_title')->nullable();
            $table->string('es_title')->nullable();
            $table->string('nl_title')->nullable();
            $table->string('fr_title')->nullable();
            $table->string('en_content')->nullable();
            $table->string('es_content')->nullable();
            $table->string('nl_content')->nullable();
            $table->string('fr_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_notifications');
    }
}
