<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservacion;
use App\Cliente;
use DB;
class CheckInController extends Controller
{
    public function VerificarPasajero($idCliente)
    {
        $pasajero =Cliente::where('id', $idCliente)->first();
        return view('CheckIn.VerificarPersona')->with('pasajero', $pasajero);
    }

    public function BuscarPasajero(Request $request){
        $query = trim($request->get('searchText'));
        $pasajero=DB::table('cliente as c')
        ->where('c.dpi', 'LIKE', '%'.$query.'%')
        ->select('c.id as id', 'c.nombre as nombre', 'c.apellido as apellido',
                'c.dpi as dpi')
        ->get();
        return view('CheckIn.BuscarPersona',["pasajeros"=>$pasajero,"searchText"=>$query]);
    }
}