<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoTarjetaController extends Controller
{
    public function ventana(){
        return view('PagoTarjeta.PagoTarjeta');
    }
}
