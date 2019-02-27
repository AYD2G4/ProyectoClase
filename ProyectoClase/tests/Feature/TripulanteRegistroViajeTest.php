<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TripulanteRegistroRegistroViajeTest extends TestCase
{

    public function testTripulanteRegistroGet(){
    }
    public function testCrearTripulanteRegistroGet(){
    }
    public function testCrearTripulanteRegistroPost(){
    }
    public function testEliminarTripulanteRegistroGet(){
    }
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE TripulanteRegistroTest----
     *
     *
     *
     *
     *Test1: Prueba que lista las TripulanteRegistros realizadas por un cliente
     *
     */
    public function testVistaListarTripulanteRegistro(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    //Crear TripulanteRegistro
    //Agregar TripulanteRegistro
    //Listar TripulanteRegistro
    //Borrar TripulanteRegistro
    $response = $this->get('/ListarDetalleTripulanteRegistro/'.$TripulanteRegistro_id);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
