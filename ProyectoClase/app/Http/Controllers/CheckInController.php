<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
use App\Cliente;
class CheckInController extends Controller
{
    public function VerificarPasajero($idCliente)
    {
        $pasajero =Cliente::where('id', $idCliente)->first();
        return view('CheckIn.VerificarPersona')->with('pasajero', $pasajero);
    }
}