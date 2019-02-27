<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class DetalleCompraAuxiliar extends TestCase
{
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE DetalleCompraAuxiliar----
     *
     *
     * Primer prueba unitaria en metodología TDD
     *
     *
     * Test1: Lista los detalles de una compra especifca
     *
     */
    public function testVistaListarDetalleCompraAuxiliar(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    $compra_id = "1";
    //Crear compra
    //Agregar detalle compra
    //Listar detalle compra
    //Borrar detalle compra
    //Borrar compra
    $response = $this->get('/ListarDetalleCompra/'.$compra_id);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /***
     * Test 2: guardar Detalle compra
     */
    public function testGuardarDetalleCompraAuxiliar()
    {
        $response = $this->call('POST', '/login', [
            'email' => 'aydusacg4@gmail.com',
            'password' => '@123Password',
            '_token' => csrf_token()
            ]);
         //Crear compra
        //Agregar detalle compra
        //Contar detalle compra
        //Borrar detalle compra
        //Borrar compra
    }

}
