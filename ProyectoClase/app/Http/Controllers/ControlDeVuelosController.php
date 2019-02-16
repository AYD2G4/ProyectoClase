<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlDeVuelosController extends Controller
{
    public function menu(){
        return view('ControlDeVuelos.ControlDeVuelos');
    }
    public function estadoAviones(){
        return view('ControlDeVuelos.EstadoAviones');
    }
    public function RegistrodeVuelos(){
        $Aeropuertos=DB::table('aeropuerto as A')->get();
        /**
         * retorno de la vista Registro de Vuelos
         * 
         * return view('CrearGrupo.GruposCreados')->with("Aeropuertos",$Aeropuertos)->with("contador",0);                
        **/
        return view('ControlDeVuelos.RegistroDeVuelos')->with("Aeropuertos",$Aeropuertos);
    }
}
