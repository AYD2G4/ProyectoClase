<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CargoTest extends TestCase
{


    public function testCargoGet(){
    }
    public function testCrearCargoGet(){
    }
    public function testCrearCargoPost(){
    }
    public function testEliminarCargoGet(){
    }
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE CargoTest----
     *
     *
     *
     *
     *Test1: Prueba que lista las Cargos realizadas por un cliente
     *
     */
    public function testVistaListarCargo(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    //Crear Cargo
    //Agregar Cargo
    //Listar Cargo
    //Borrar Cargo
    $response = $this->get('/ListarDetalleCargo/'.$Cargo_id);
        $this->assertEquals(200, $response->getStatusCode());
    }

}
