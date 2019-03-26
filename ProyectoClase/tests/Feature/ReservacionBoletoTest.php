<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Reservacion;
use App\Http\Controllers\ReservacionController;

class ReservacionBoletoTest extends TestCase
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
     * Test 1
     * Funcion insertar Reservacion
     */
    public function test1()
    {
        Reservacion::truncate();
        $controller = new ReservacionController();
        $reservacion = $controller->MetodoCrearReservacion(1);
        $this->assertNotNull($reservacion);
        $reservacion->delete();
    }

    /**
     * Test 2
     * Funcion Obtener Reservacion
     */
    public function test2()
    {
        Reservacion::truncate();
        $controller = new ReservacionController();
        $reservacion = $controller->MetodoCrearReservacion(1);
        $reservacion2 = $controller->MetodoObtenerReservacion($reservacion->id);
        $this->assertNotNull($reservacion2);
        $reservacion->delete();
    }

    /**
     * Test 3
     * Funcion eliminar Reservacion
     */
    public function test3()
    {
        Reservacion::truncate();
        $controller = new ReservacionController();
        $reservacion = $controller->MetodoCrearReservacion(1);
        $idReservacion = $reservacion->id;
        $reservacion2 = $controller->MetodoQuitarReservacion($idReservacion);
        $reservacion3 = $controller->MetodoObtenerReservacion($idReservacion);
        $this->assertNull($reservacion3);
    }

    /**
     * Test 4
     * Funcion Listar Reservacion
     */
    public function test4()
    {
        $controller = new ReservacionController();
        $controller->MetodoCrearReservacion(1);
        $controller->MetodoCrearReservacion(1);
        $controller->MetodoCrearReservacion(1);
        $controller->MetodoCrearReservacion(1);
        $Reservaciones =$controller->MetodoListarReservacionesCliente();
        $this->assertEquals(count($Reservaciones), 4);
        Reservacion::truncate();
    }


    /**
    * Test 6
    * Visitar pagina Listar Reservaciones
    */
    public function test6()
    {
        $response = $this->get('/VerReservaciones');
        $response->assertStatus(200);
        Reservacion::truncate();
    }

}
