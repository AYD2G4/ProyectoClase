<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\CargosController;
use App\Cargos;

class CargoTest extends TestCase
{


    public function testCrearCargo(){
        $controller = new CargosController();
        $cargo=$controller->MetodoCrearCargo("Cargo1");
        $this->assertNotNull($cargo);
        $cargo->delete();
    }

    public function testEliminarCargo(){
        $controller = new CargosController();
        $cargo= $controller->MetodoCrearCargo("Cargo1");
        $idCargo = $cargo->id;
        $controller->MetodoEliminarCargo($idCargo);
        $cargo1 =$controller->MetodoObtenerCargo($idCargo);
        $this->assertNull($cargo1);
    }

    public function testVistaCrearCargo(){
        $response = $this->get('/CrearCargo');
        $response->assertStatus(200);
    }

    public function testVistaElminarCargo(){
        $response = $this->get('/ListarCargos');
        $response->assertStatus(200);
    }
}
