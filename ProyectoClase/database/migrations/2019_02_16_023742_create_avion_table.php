<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->unsigned();//0->inactivo 1->activo
            $table->string('codigo');//podria ser una placa
            $table->integer('aeropuerto1')->nullable();//numero del lugar aeropuerto1
            $table->integer('aeropuerto2')->nullable();//numero del lugar aeropuerto2
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
        Schema::dropIfExists('avion');
    }
}
