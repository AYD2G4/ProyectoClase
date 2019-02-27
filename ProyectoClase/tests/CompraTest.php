<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CompraTest extends TestCase
{
    /***
     * Test 2: guardar Detalle compra
     */
    public function testGuardarCompra()
    {
        $response = $this->call('POST', '/login', [
            'email' => 'aydusacg4@gmail.com',
            'password' => '@123Password',
            '_token' => csrf_token()
            ]);
        //Crear Compra
        //Agregar elementos detalle compra
        //Post contar que el detalle de compra sean los que ingresamos.
    }

    public function testVerificarContenidoCompra(){

    }

    public function testCompraGet(){

    }

    public function testCrearCompraGet(){

    }

    public function testCrearCompraPost(){

    }

    public function testEliminarCompraGet(){

    }

    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE CompraTest----
     *
     *
     *
     *
     *Test1: Prueba que lista las compras realizadas por un cliente
     *
     */
    public function testVistaListarCompra(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    //Crear compra
    //Agregar compra
    //Listar compra
    //Borrar compra
    $response = $this->get('/ListarDetalleCompra/'.$compra_id);
        $this->assertEquals(200, $response->getStatusCode());
    }




}
