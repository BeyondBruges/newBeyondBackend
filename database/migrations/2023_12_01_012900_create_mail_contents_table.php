<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_contents', function (Blueprint $table) {
            $table->id();
            $table->string('email_image_top')->default("/images/top.jpg");
            $table->longText('en_welcome')->nullable();
            $table->longText('es_welcome')->nullable();
            $table->longText('nl_welcome')->nullable();
            $table->longText('fr_welcome')->nullable();
            $table->string('email_image_middle')->default("/images/logo.jpg");
            $table->longText('en_first')->nullable();
            $table->longText('es_first')->nullable();
            $table->longText('nl_first')->nullable();
            $table->longText('fr_first')->nullable();
            $table->longText('en_second')->nullable();
            $table->longText('es_second')->nullable();
            $table->longText('nl_second')->nullable();
            $table->longText('fr_second')->nullable();
            $table->string('email_image_bottom')->default("/images/1.png");
            $table->longText('en_third')->nullable();
            $table->longText('es_third')->nullable();
            $table->longText('nl_third')->nullable();
            $table->longText('fr_third')->nullable();
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
        Schema::dropIfExists('mail_contents');
    }
}
