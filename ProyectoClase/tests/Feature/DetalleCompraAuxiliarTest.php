<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Boleto;
use App\DetalleCompraAux;
use App\Http\Controllers\RegistroVueloController;
use App\Http\Controllers\DetalleCompraAuxiliarController;

class DetalleCompraAuxiliarTest extends TestCase
{

    public function testVerificarDisponibilidadBoletosLibres(){
        DetalleCompraAux::truncate();
        Boleto::truncate();

        $registro_vuelo_id = 1;

        $controllerRegistroVuelo = new RegistroVueloController();
        $controllerRegistroVuelo->GenerarBoletosAvion($registro_vuelo_id,20);

        $controllerDetalleCompraAuxiliar = new DetalleCompraAuxiliarController();
        $this->assertEquals( $controllerDetalleCompraAuxiliar->VerificarDisponibilidadBoletosLibres($registro_vuelo_id,30),false);

        DetalleCompraAux::truncate();
        Boleto::truncate();
    }

    public function testAgregarBoletos(){
        DetalleCompraAux::truncate();
        Boleto::truncate();

        //$registro_vuelo_id,$cantidad
        $registro_vuelo_id = 1;
        $cantidad = 5;

        $controllerRegistroVuelo = new RegistroVueloController();
        $controllerRegistroVuelo->GenerarBoletosAvion($registro_vuelo_id,20);

        $controllerDetalleCompraAuxiliar = new DetalleCompraAuxiliarController();
        $this->assertEquals( $controllerDetalleCompraAuxiliar->AgregarCantidadBoletos($registro_vuelo_id,5),true);
    }

}
