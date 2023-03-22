<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->integer('status_ios')->default(1);
            $table->string('minimun_version_ios')->default("1.0");
            $table->string('latest_version_ios')->default("1.0");
            $table->integer('status_android')->default(1);
            $table->string('minimum_version_android')->default("1.0");
            $table->string('latest_version_android')->default("1.0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
