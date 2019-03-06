<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tarjeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_tarjeta');
            $table->string('apellido_tarjeta');
            $table->integer('No');
            $table->string('Fecha');
            $table->integer('Codigo');
            $table->integer('cliente_id')->unsigned();//
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
        Schema::dropIfExists('tarjeta');
    }
}
