<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Boleto;
use App\Http\Controllers\RegistroVueloController;

class BoletoTest extends TestCase
{
    /**
     * Test 1
     * Crear Boleto
     */

    public function testCrearBoleto(){
        Boleto::truncate();
        $controller = new RegistroVueloController();
        $boleto = $controller->CrearBoleto(1);
        $this->assertNotNull($boleto);
        $boleto->delete();
    }

    /**
     * Test 2
     * Obtener Boleto
     */
    public function testObtenerBoleto(){
        Boleto::truncate();
        $controller = new RegistroVueloController();
        $boleto = $controller->CrearBoleto(1);
        $boleto1 = $controller->ObtenerBoleto($boleto->id);
        $this->assertNotNull($boleto1);
        $boleto->delete();
    }

    /**
     * Test 3
     * Editar Boleto
     */
    public function testEditarBoleto(){
        Boleto::truncate();
        $controller = new RegistroVueloController();
        $boleto = $controller->CrearBoleto(1);
        $boleto1 = $controller->EditarEstadoBoleto($boleto->id,1);
        $this->assertEquals($boleto1->estado,1);
        $boleto->delete();
    }

    /**
     * Test 4
     * Eliminar Boleto
     */
    public function testEliminar(){
        Boleto::truncate();
        $controller = new RegistroVueloController();
        $boleto = $controller->CrearBoleto(1);
        $idBoleto = $boleto->id;
        $boleto1 = $controller->EliminarBoleto($idBoleto);
        $boleto2 = $controller->ObtenerBoleto($idBoleto);
        $this->assertNull($boleto1);
        $boleto->delete();
    }

    /**
     * Test 5
     * Crear cantidad de Boletos
     */
    public function testCrearBoletosAvion(){
        Boleto::truncate();
        $controller = new RegistroVueloController();
        $controller->GenerarBoletosAvion(1,20);
        $boletos =  $controller->ObtenerBoletoRegistroVuelo(1);
        $this->assertEquals(count($boletos),20);
        Boleto::truncate();
    }

}
