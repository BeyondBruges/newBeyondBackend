<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('user_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5919751')->references('id')->on('users');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_5919752')->references('id')->on('transactions');
        });
    }
}
