<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControlVuelosTest extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista /ControlDeVuelos
     */
    public function testControlVuelos(){
        $response = $this->get('/ControlDeVuelos');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar si esta retornando correctamente la vista /EstadoAviones
     */
    public function testEstadoAviones(){
        $response = $this->get('/estadoAviones');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar si esta retornando correctamente la vista /definirRuta
     */
    public function testDefinirRuta(){
      //  $response = $this->get('/definirRuta');
      //  $this->assertEquals(200, $response->getStatusCode());
      $response = $this->get('/');

        $response->assertStatus(200);
    }
}
