<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartnerDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('partner_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_5945483')->references('id')->on('partners');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id', 'language_fk_5945484')->references('id')->on('languages');
        });
    }
}
