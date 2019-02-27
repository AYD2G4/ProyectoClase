<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
class BoletoTest extends TestCase
{
    /***
     * Test 2: guardar Detalle compra
     */
    public function testGuardarBoleto()
    {
        $response = $this->call('POST', '/login', [
            'email' => 'aydusacg4@gmail.com',
            'password' => '@123Password',
            '_token' => csrf_token()
            ]);
        //Crear Boleto
        //Agregar elementos detalle compra
        //Post contar que el detalle de compra sean los que ingresamos.
    }

    public function testVerificarContenidoBoleto(){

    }

    public function testBoletoGet(){

    }

    public function testCrearBoletoGet(){

    }

    public function testCrearBoletoPost(){

    }

    public function testEliminarBoletoGet(){

    }

    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE BoletoTest----
     *
     *
     *
     *
     *Test1: Prueba que lista las compras realizadas por un cliente
     *
     */
    public function testVistaListarBoleto(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    //Crear compra
    //Agregar compra
    //Listar compra
    //Borrar compra
    $response = $this->get('/ListarDetalleBoleto/'.$compra_id);
        $this->assertEquals(200, $response->getStatusCode());
    }




}
