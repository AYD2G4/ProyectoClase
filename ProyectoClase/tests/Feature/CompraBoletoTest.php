<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompraBoletoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGenerarBoleto(){
        //$idRegistroVuelo
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCambiarEstadoBoleto(){
        //$idBoleto
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testVerificarEstadoBoleto(){
        //$idBoleto
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /***
     * Test 2: Guardar Compra
     */
    public function testGuardarCompra()
    {
        //Crear Compra
        //Agregar elementos detalle compra
        //Post contar que el detalle de compra sean los que ingresamos.
        $response = $this->get('/');

        $response->assertStatus(200);
    }

     /***
     * Test 2: Listar Compras
     */
    public function testListarCompras()
    {
        //Crear Compra
        //Agregar elementos detalle compra
        //Post contar que el detalle de compra sean los que ingresamos.
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
