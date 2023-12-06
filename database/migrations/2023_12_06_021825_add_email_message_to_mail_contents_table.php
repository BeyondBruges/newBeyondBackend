<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailMessageToMailContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mail_contents', function (Blueprint $table) {
            $table->longText('en_success')->nullable();
            $table->longText('es_success')->nullable();
            $table->longText('nl_success')->nullable();
            $table->longText('fr_success')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mail_contents', function (Blueprint $table) {
            //
        });
    }
}
