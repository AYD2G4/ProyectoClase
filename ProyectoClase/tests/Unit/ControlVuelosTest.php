<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControlVuelosTest extends TestCase
{
    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: Aeropuerto
     * y la columna: Nombre
     */
    public function testCrearAeropuertoDB()
    {
        $this->assertDatabaseHas('aeropuerto', [
            'nombre' => 'Aeropuerto Internacional La Aurora'
        ]);
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: avion
     * y la columna: codigo
     */
    public function testCrearAvionDB()
    {
        $this->assertDatabaseHas('avion', [
            'codigo' => 'A7575'
        ]);
    }

    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: vuelo
     * y la columna: aeropuertosalida
     */
    public function testCrearVueloDB()
    {
        $this->assertDatabaseHas('vuelo', [
            'aeropuertosalida' => '1'
        ]);
    }

    /**
    * Prueba para verificar que se puede cargar Menu
    */
    public function testMenuControlVuelos(){
        $response = $this->get('/ControlDeVuelos');
        $response->assertSeeText('MENU CONTROL DE VUELOS');
    }

    /**
    * Prueba para verificar que se puede ver el Estado de los aviones
    */
    public function testEstadoAviones(){
        $response = $this->get('/estadoAviones');
        $response->assertSeeText('ESTADO DE AVIONES');
    }

    /**
    * Prueba para verificar que se puede guardar nuevo registro de vuelo
    */
    public function testRegistroVuelo(){
        $response = $this->get('/registroDeVuelos');
        $response->assertSeeText('DEFINIR RUTA');
    }


}
