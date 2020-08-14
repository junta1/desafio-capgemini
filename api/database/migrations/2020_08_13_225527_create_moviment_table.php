<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moviment', function (Blueprint $table) {
            $table->bigIncrements('movi_id');
            $table->dateTime('movi_date');
            $table->double('movi_value');
            $table->string('movi_');

            $table->unsignedBigInteger('cod_type_drive');
            $table->unsignedBigInteger('cod_account');

            $table->foreign('cod_type_drive')->references('type_driv_id')->on('type_drive');
            $table->foreign('cod_account')->references('acco_id')->on('account');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moviment');
    }
}
