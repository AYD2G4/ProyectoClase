<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarjeta;

class PagoTarjetaController extends Controller
{
    public function ventana(){
        return view('PagoTarjeta.PagoTarjeta')
        ->with("mensaje", "");
    }
    public function pagar($num){
        
    }
    public function ventanaGuardar(Request $request){
        $Tarjeta=new Tarjeta();
        $Tarjeta->nombre_tarjeta=$request->input('Nombre');
        $Tarjeta->apellido_tarjeta=$request->input('Apellido');
        $Tarjeta->No=$request->input('Tarjeta');
        $Tarjeta->Fecha=$request->input('Fecha');
        $Tarjeta->Codigo=$request->input('Codigo');
        $Tarjeta->cliente_id=1;//ETO HAY QUE CAMBIAR
        if(strlen($Tarjeta->Codigo)==4){
            $Tarjeta->save();
            dd("gUARDADO");
        }else{
            return view('PagoTarjeta.PagoTarjeta')
            ->with("mensaje", "LA TARJETA NO ES VALIDA");
        }
    }
}
