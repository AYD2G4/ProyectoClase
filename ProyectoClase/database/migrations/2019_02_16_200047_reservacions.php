<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechahora');
            $table->integer('registro_vuelo_id')->unsigned();//
            $table->integer('vuelo_id')->unsigned();//
            $table->integer('cliente_id')->unsigned();//
            $table->integer('boleto_id')->unsigned();//
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
        Schema::dropIfExists('reservacion');
    }
}
