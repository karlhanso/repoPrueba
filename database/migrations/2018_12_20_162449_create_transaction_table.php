<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_transaccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('return_code');
            $table->string('bankURL');
            $table->string('trazabilityCode');
            $table->string('transactionCycle');
            $table->string('transactionID');
            $table->string('sessionID');
            $table->string('bankFactor');
            $table->string('responseCode');
            $table->string('responseReasonCode');
            $table->string('responseReasonText');
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
        Schema::dropIfExists('my_transaccions');
    }
}
