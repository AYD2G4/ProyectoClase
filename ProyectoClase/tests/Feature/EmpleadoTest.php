<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\EmpleadoController;
use App\Empleados;

class EmpleadoTest extends TestCase
{
    public function testCrearEmpleado()
    {
        $controller = new EmpleadoController();
        $empleado=$controller->MetodoCrearEmpleado("Cargo1",12345678,"ABCD12",12345678,"1998-04-01");
        $this->assertNotNull($empleado);
        $empleado->delete();
    }

    public function testEliminarEmpleado()
    {
        $controller = new EmpleadoController();
        $empleado=$controller->MetodoCrearEmpleado("Cargo1",12345678,"ABCD12",12345678,"1998-04-01");
        $idEmpleado = $empleado->id;
        $controller->MetodoEliminarEmpleado($idEmpleado);
        $empleado1 =$controller->MetodoObtenerEmpleado($idEmpleado);
        $this->assertNull($empleado1);
    }

    public function testVistaCrearEmpleado(){
        $response = $this->get('/CrearEmpleado');
        $response->assertStatus(200);
    }

    public function testVistaListarEmpleados(){
        $response = $this->get('/ListarEmpleado');
        $response->assertStatus(200);
    }
}
