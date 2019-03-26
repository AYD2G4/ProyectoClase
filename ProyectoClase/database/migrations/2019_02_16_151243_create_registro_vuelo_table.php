<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroVueloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_vuelo', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechasalida');
            $table->time('horasalida');
            $table->date('fechallegada');
            $table->time('horallegada');
            $table->integer('vuelo')->unsigned();
            $table->integer('avion')->unsigned();
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
        Schema::dropIfExists('registro_vuelo');
    }
}
