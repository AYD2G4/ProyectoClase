<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TripulanteTest extends TestCase
{

    public function testTripulanteGet(){
    }
    public function testCrearTripulanteGet(){
    }
    public function testCrearTripulantePost(){
    }
    public function testEliminarTripulanteGet(){
    }
    /**
     * ARCHIVO DE PRUEBAS UNITARIAS EXLUSIVO
     * PARA LA VISTA DE TripulanteTest----
     *
     *
     *
     *
     *Test1: Prueba que lista las Tripulantes realizadas por un cliente
     *
     */
    public function testVistaListarTripulante(){
        $response = $this->call('POST', '/login', [
        'email' => 'aydusacg4@gmail.com',
        'password' => '@123Password',
        '_token' => csrf_token()
        ]);
    //Crear Tripulante
    //Agregar Tripulante
    //Listar Tripulante
    //Borrar Tripulante
    $response = $this->get('/ListarDetalleTripulante/'.$Tripulante_id);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
