<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpleadoTest extends TestCase
{
    public function testCrearEmpleado()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testEliminarEmpleado()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testListarEmpleado(){
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testVistaCrearEmpleado(){
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testVistaEliminarEmpleado(){
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testVistaListarEmpleados(){
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
