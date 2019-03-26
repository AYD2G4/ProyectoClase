<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DetalleCompraTest extends TestCase
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
      /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE DetalleCompraTest----
     *
     *
     * Primer prueba unitaria en metodología TDD
     *
     *
     * Test1: Lista los detalles de una compra especifca
     *
     */
    public function testVistaListarDetalleCompra(){

    $compra_id = "1";
    //Crear compra
    //Agregar detalle compra
    //Listar detalle compra
    //Borrar detalle compra
    //Borrar compra
    $response = $this->get('/');

    $response->assertStatus(200);
    }

    /***
     * Test 2: guardar Detalle compra
     */
    public function testGuardarDetalleCompra()
    {
         //Crear compra
        //Agregar detalle compra
        //Contar detalle compra
        //Borrar detalle compra
        //Borrar compra
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
