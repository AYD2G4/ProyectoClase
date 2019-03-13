<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManejoHorariosTest extends TestCase
{
    /**
     * Prueba creada para probar si esta retornando correctamente la vista /ManjeoHorario
     */
    public function testManejoHorario(){
        $response = $this->get('/manejoDeHorarios');
        $this->assertEquals(200, $response->getStatusCode());
    }
    
    /**
    * Prueba para verificar que se puede cargar ManejoHorario
    */
    public function testMenuControlVuelos(){
        $response = $this->get('/manejoDeHorarios');
        $response->assertSeeText('EDICION DE HORARIO');
    }
    
    

}
