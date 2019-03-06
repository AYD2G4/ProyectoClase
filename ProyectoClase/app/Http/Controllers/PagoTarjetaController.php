<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoTarjetaController extends Controller
{
    public function ventana(){
        return view('PagoTarjeta.PagoTarjeta');
    }
    public function ventanaGuardar(Request $request){
        /**$Vuelo=new Vuelo();
        $Vuelo->aeropuertosalida=$request->input('AeropuertoSalida');
        $Vuelo->aeropuertodestino=$request->input('AeropuertoLlegada');
        $Vuelo->save();
        return Redirect::to('/vuelos/');
        **/
        $Nombre=$request->input('Nombre');
        $Apellido=$request->input('Apellido');
        $Tarjeta=$request->input('Tarjeta');
        $Fecha=$request->input('Fecha');
        $Codigo=$request->input('Codigo');
        dd($Nombre.",".$Apellido.",".$Tarjeta.",".$Fecha.",".$Codigo);
    }
}
