<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_exchanges', function (Blueprint $table) {
            $table->id();
            $table->integer('exchange_id');
            $table->integer('state_id');
            $table->timestamps();

            $table->foreign('exchange_id')->references('id')->on('exchanges');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_exchanges');
    }
}
