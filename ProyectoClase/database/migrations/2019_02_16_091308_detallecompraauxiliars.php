<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detallecompraauxiliars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('detallecompraauxiliar', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('compra_id')->unsigned();//
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
        Schema::dropIfExists('detallecompraauxiliar');
    }
}
