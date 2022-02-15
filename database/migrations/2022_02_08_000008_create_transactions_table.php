<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('value', 15, 2);
            $table->integer('status');
            $table->unsignedBigInteger('transaction_type')
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
