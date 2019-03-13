<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\PaqueteriaController;

class PaqueteriaTest extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista /ListarPaquetes
     */
    public function testListarPaquetes(){
        $response = $this->get('/ListarPaquetes');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Prueba creada para probar si esta retornando correctamente la vista /EstadoAviones
     */
    public function testRegistroDePaquetes(){
        $response = $this->get('/registroDePaquetes');
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testCrearPaquete()
    {
        $controller = new PaqueteriaController();
        $paquete=$controller->MetodoCrearPaquete(2,23,"Lacteos",23,12,23, "En espera");
        $this->assertNull($paquete);
        $paquete->delete();
    }
    /**
     * Prueba creada para probar si esta retornando correctamente la vista /definirRuta
     */
    
}
