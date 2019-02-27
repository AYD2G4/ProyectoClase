<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManejoHorariosTest extends TestCase
{
    /**
     * Prueba creada para probar la respueta de la base de datos de la tabla: registro_vuelo
     * y la columna: fechasalida
     */
    public function testCrearAeropuertoDB()
    {
        $this->assertDatabaseHas('registro_vuelo', [
            'fechasalida' => '2019-02-25'
        ]);
    }

}
