<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('acco_id');
            $table->string('acco_agency');
            $table->string('acco_account');
            $table->string('acco_balance');

            $table->unsignedBigInteger('cod_client');
            $table->unsignedBigInteger('cod_bank');

            $table->foreign('cod_client')->references('clie_id')->on('client');
            $table->foreign('cod_bank')->references('bank_id')->on('bank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
