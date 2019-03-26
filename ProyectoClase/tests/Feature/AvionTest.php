<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AvionController;
use App\Avion;

class AvionTest extends TestCase
{
    public function testCrearAvion()
    {
        $controller = new AvionController();
        $avion=$controller->MetodoCrearAvion(250,"ASDF",1,"AVION TEMPORAL");
        $this->assertNotNull($avion);
        $avion->delete();
    }

    public function testEliminarAvion()
    {
        $controller = new AvionController();
        $avion=$controller->MetodoCrearAvion(250,"ASDF",1,"AVION TEMPORAL");
        $idAvion = $avion->id;
        $controller->MetodoEliminarAvion($idAvion);
        $avion1 =$controller->MetodoObtenerAvion($idAvion);
        $this->assertNull($avion1);
    }

    public function testVistaCrearEmpleado(){
        $response = $this->get('/CrearAvion');
        $response->assertStatus(200);
    }

    public function testVistaListarEmpleados(){
        $response = $this->get('/ListarAviones');
        $response->assertStatus(200);
    }
}
